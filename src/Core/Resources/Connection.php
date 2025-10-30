<?php

declare(strict_types=1);

namespace SDK\Core\Resources;

use SDK\Core\Application;
use SDK\Core\Dtos\Error;
use SDK\Core\Enums\ApiResponses;
use SDK\Core\Exceptions\ConnectionException;
use SDK\Core\Registry;
use SDK\Core\Resources\Loggers\ConnectionLogger;
use SDK\Core\Dtos\Request;
use SDK\Core\Exceptions\ApiRequestException;

/**
 * This is the Connection class in the LogiCommerce SDK package.
 * All LogiCommerce API connections are done through this class.
 *
 * @see Connection::getInstance()
 * @see Connection::get()
 * @see Connection::post()
 * @see Connection::put()
 * @see Connection::delete()
 * @see Connection::getRequestHeaders()
 *
 * @package SDK\Core\Resources
 */
final class Connection {

    /**
     *
     * @staticvar string
     */
    public const STATUS = 'status';

    /**
     *
     * @staticvar string
     */
    public const RESULT = 'result';

    /**
     *
     * @staticvar string
     */
    public const CODE = 'code';

    /**
     *
     * @staticvar string
     */
    private const REMOTE_ADDR = 'REMOTE_ADDR';

    private static ConnectionLogger $logger;

    private static Timer $timer;

    /**
     * Returns the Connection instance.
     * If is not setted, this method will set it.
     *
     * @return Connection
     */
    public static function getInstance(): self {
        if (!Registry::exist(Registry::CONNECTION)) {
            Registry::set(Registry::CONNECTION, new self());
        }
        return Registry::get(Registry::CONNECTION);
    }

    private function __construct() {
        self::$logger ??= ConnectionLogger::getInstance();
        if (!isset(self::$timer)) {
            self::$timer = Timer::getTimer('connection');
            self::$timer->start();
        }
    }

    private function __clone() {
        // Prevent clone this object
    }

    /**
     * This will made a curl petition to the given API resource with the given method.
     * The return will be the deserialized API response.
     *
     * @param Request $request
     *            The request with all the needed data to send it
     * @param string $apiUrl
     *            The URL of the API we want to do the request on
     *
     * @return array
     * @throws ConnectionException
     */
    public function doRequest(Request $request, string $apiUrl = null): array {
        $timerFlag = $apiUrl;
        if (is_null($timerFlag) || !strlen($timerFlag)) {
            $timerFlag = $request->getPath();
        }
        $path = $request->getFullPath();
        $flagName = 'connection-time-' . $path . '-' . uniqid();
        self::$timer->addFlag($flagName, true);
        $apiUrl = ApiRequest::getApiURL($apiUrl);
        $apiRequest = $this->getRequest($request, $apiUrl);
        $apiRequest->setParams($request->getUrlParams());
        if (!empty($request->getBody())) {
            $apiRequest->setBody(json_encode($request->getBody()));
        }
        $response = $apiRequest->send();
        $response[self::RESULT]['httpStatus'] = $response[self::STATUS];
        $logData = [
            'method' => $request->getMethod(),
            'path' => $path,
            'time_taken' => self::$timer->getElapsedTime($flagName),
            'api_url' => $apiUrl
        ];
        self::$logger->info(
            'API REQUEST INFO: [METHOD: ' . $request->getMethod() . '] - [PATH: ' . $path . '] - [STATUS: ' . $response[self::STATUS][self::CODE] . ']',
            $logData + [self::CODE => ConnectionLogger::CONNECTION_INFO]
        );

        if ($response[self::STATUS][self::CODE] == 401) {
            $code = $response[self::RESULT][self::CODE] ?? '';
            $resend = false;
            if (strpos($code, ApiResponses::AUTH_EXPIRED) !== false) {
                Application::getInstance()->refreshToken();
                $resend = true;
            } elseif (strpos($code, ApiResponses::AUTH_UNAUTHORIZED) !== false || strpos($code, ApiResponses::AUTH_REQUIRED) !== false) {
                Application::getInstance()->setToken();
                $resend = true;
            }
            if ($resend) {
                $flagNameResend = 'connection-time-' . $path . '-' . uniqid();
                self::$timer->addFlag($flagNameResend, true);
                $apiRequest->setToken();
                $response = $apiRequest->send();
                $response[self::RESULT]['httpStatus'] = $response[self::STATUS];
                $logData['time_taken'] = self::$timer->getElapsedTime($flagNameResend);
                self::$logger->info(
                    'API REQUEST RESEND: [METHOD: ' . $request->getMethod() . '] - [PATH: ' . $path . '] - [STATUS: ' . $response[self::STATUS][self::CODE] . ']',
                    $logData + [self::CODE => ConnectionLogger::CONNECTION_INFO]
                );
            }
        }

        if ($response[self::STATUS][self::CODE] >= 400) {
            $response[self::RESULT]['statusMessage'] = $response[self::STATUS]['message'];
            $error = new Error($response[self::RESULT]);
            $warning = 'API REQUEST WARNING: [METHOD: ' . $request->getMethod() . '] - [PATH: ' . $request->getPath() . '] - [ERROR: ' . $error . ']';
            if (Environment::get('DEVEL') && defined('THROW_CONNECTION_ERRORS') && THROW_CONNECTION_ERRORS) {
                throw new ConnectionException($error, ConnectionException::CONNECTION_ERROR);
            } else {
                self::$logger->warning(
                    $warning,
                    $logData + [
                        self::CODE => ConnectionLogger::CONNECTION_ERROR,
                        'time_taken' => self::$timer->getElapsedTime($flagName),
                        'error' => $error->toArray()
                    ]
                );
            }
            if ($response[self::STATUS][self::CODE] != 404) {
                VarnishManagement::setXttl(DEFAULT_ON_ERROR_TTL, $warning);
            }
            return ['error' => $error];
        }

        return $response[self::RESULT];
    }

    /**
     * This will made a curl petition to the given API resource with the given metod.
     * The return will be the deserialized API response.
     *
     * @param Request $request
     *            The object that contains the data to made the request
     * @param string $apiUrl
     *            The URL of the API we want to do the request on
     *
     * @see ApiRequest
     *
     * @return array
     */
    private function getRequest(Request $request, string $apiUrl): ApiRequest {
        return new ApiRequest(
            $request->getFullPath(),
            $request->getMethod(),
            ($request->getHeaders() + self::getRequestHeaders()),
            $request->getFormParams(),
            $apiUrl
        );
    }

    /**
     * Returns the request frequent needed headers.
     * Those headers are:
     * <ul>
     * <li>userAgent (HTTP_USER_AGENT)</li>
     * <li>serverAddr (SERVER_ADDR)</li>
     * <li>remoteAddr (REMOTE_ADDR)</li>
     * <li>ip (Calculated. Not necessarily the same as "remoteAddr")</li>
     * <li>countryCode request header X-COUNTRY-CODE or DEFAULT_CONNECTION_COUNTRY_CODE</li>
     * <li>referer (HTTP_REFERER)</li>
     * <li>hostName (gethostname)</li>
     * </ul>
     * All of them extracted from $_SERVER scope
     *
     * @return array
     */
    public static function getRequestHeaders(): array {
        $headers = [
            'userAgent' => self::getInformation('HTTP_USER_AGENT'),
            'serverAddr' => self::getInformation('SERVER_ADDR'),
            'remoteAddr' => self::getInformation(self::REMOTE_ADDR),
            'ip' => self::getIp(),
            'countryCode' => self::getCountryCode(),
            'referer' => self::getInformation('HTTP_REFERER'),
            'hostName' => gethostname()
        ];
        $isBot = self::getIsBot();
        if (!is_null($isBot)) {
            $headers['x-is-bot'] = $isBot;
        }
        if (Registry::exist(Registry::PAGE_TYPE)) {
            $headers[Registry::PAGE_TYPE] = Registry::get(Registry::PAGE_TYPE);
        }
        if (defined('REQUEST_ID')) {
            $headers['requestId'] = REQUEST_ID;
        }
        return $headers;
    }

    private static function getInformation(string $key, bool $nullOnUndefined = false): ?string {
        return Server::get($key) ?? ($nullOnUndefined === true ? null : 'unknown');
    }

    public static function getIsBot(): ?string
    {
        if (!defined("REQUEST_HEADERS") || !isset(REQUEST_HEADERS['X-IS-BOT'])) {
            return null;
        } else {
            return REQUEST_HEADERS['X-IS-BOT'];
        }
    }

    /**
     * Returns the website host.
     *
     * @return string
     */
    public static function getHost(): string {
        return self::getInformation('SERVER_NAME');
    }

    /**
     * Returns if the website is being used with the secure protocol "https".
     *
     * @return string
     */
    public static function isHttps(): bool {
        return (Environment::get('DEVEL') && Environment::get('COMMERCE_PROTOCOL') == 'https') ||
            self::getInformation('HTTPS') === 'on' ||
            self::getInformation('HTTP_X_FORWARDED_PROTO') === 'https' ||
            self::getInformation('HTTP_X_FORWARDED_SSL') === 'on' ||
            self::getInformation('HTTP_CLOUDFRONT_FORWARDED_PROTO') === 'https' ||
            self::getInformation('HTTP_X_FORWARDED_PORT') === 443;
    }

    public static function getCountryCode(): string {
        if (!defined("REQUEST_HEADERS") || !isset(REQUEST_HEADERS['X-COUNTRY-CODE']) || empty(REQUEST_HEADERS['X-COUNTRY-CODE'])) {
            return DEFAULT_CONNECTION_COUNTRY_CODE;
        } else {
            return REQUEST_HEADERS['X-COUNTRY-CODE'];
        }
    }

    public static function getIp(): string {
        $validHeaders = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            self::REMOTE_ADDR
        ];
        foreach ($validHeaders as $header) {
            if (array_key_exists($header, $_SERVER) === true) {
                $ips = explode(',', $_SERVER[$header]);
                foreach ($ips as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return self::getInformation(self::REMOTE_ADDR);
    }
}
