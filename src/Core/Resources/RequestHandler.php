<?php

declare(strict_types=1);

namespace SDK\Core\Resources;

use CurlHandle;
use SDK\Core\Enums\LoggerLevel;
use SDK\Core\Enums\MethodType;
use SDK\Core\Exceptions\RequestHandlerException;
use SDK\Core\Resources\Logger\LoggerAdapter;
use SDK\Core\Resources\Loggers\RequestHandlerLogger;

/**
 * This is the request handler class in the LogiCommerce SDK package.
 * All HTTP petitions will be pepared from that class in order to avid bad uses of php curl
 *
 * @see RequestHandler::__construct()
 * @see RequestHandler::setTimeout()
 * @see RequestHandler::setUserAgent()
 * @see RequestHandler::setHeader()
 * @see RequestHandler::setHeaders()
 * @see RequestHandler::setData()
 * @see RequestHandler::setBody()
 * @see RequestHandler::setParams()
 * @see RequestHandler::setCookies()
 * @see RequestHandler::send()
 *
 * @package SDK\Core\Resources
 */
final class RequestHandler {

    private int $status;

    private array $curlInfo = [];

    private array $curlOptions = [];

    private array $info = [];

    private string $url;

    private string $method;

    private string $error;

    private int $timeout = 10;

    private string $userAgent = '';

    private array $headers = [];

    private array $data = [];

    private string $body = '';

    private array $params = [];

    private array $cookies = [];

    private string $result;

    private array $resultHeaders;

    private array $resultCookies = [];

    private array $resultXkeyHeaders = [];

    private LoggerAdapter $logger;

    private static Timer $timer;

    private int $maxResultLength = 35000;

    /**
     * Constructor.
     * This will prepare the object to made the request.
     *
     * @param string $url
     *            request URL to call
     * @param string $method
     *            HTTP method
     * @param LoggerAdapter $logger
     *            The logger used before/after the request
     */
    public function __construct(string $url, string $method = 'get', LoggerAdapter $logger = null) {
        $this->url = $url;
        $this->method = $method;
        if (!isset(self::$timer)) {
            self::$timer = Timer::getTimer('request');
            self::$timer->start();
        }
        if (is_null($logger)) {
            $logger = RequestHandlerLogger::getInstance();
        }
        $this->logger = $logger;
    }

    /**
     * Return the request status if available.
     * The response will contains:
     * <ul>
     * <li>status</li>
     * <li>message</li>
     * </ul>
     *
     * @return array
     */
    private function getStatus(): array {
        return [
            'code' => $this->status,
            'message' => self::getStatusCodes()[$this->status] ?? 'Unknown'
        ];
    }

    /**
     * Returns the request URL with all of the setted URL (GET) parameters
     *
     * @return string
     * @throws RequestHandlerException
     */
    private function getUrlWithParams(): string {
        $urlWithParams = $this->url . Url::encodeParams($this->params);
        if (filter_var($urlWithParams, FILTER_VALIDATE_URL) === false) {
            throw new RequestHandlerException("ERROR: Invalid url: {$urlWithParams}", RequestHandlerException::INVALID_URL);
        }
        return $urlWithParams;
    }

    /**
     * Set the request timeout (the maximum time the request will wait for response).
     *
     * @param int $timeout
     *
     * @return void
     */
    public function setTimeout(int $timeout): void {
        $this->timeout = $timeout;
    }

    /**
     * Set the request user-agent.
     *
     * @param string $userAgent
     *
     * @return void
     */
    public function setUserAgent(string $userAgent): void {
        $this->userAgent = $userAgent;
    }

    /**
     * Add a new header to the request.
     *
     * @param string $key
     *            Name of the header you want to set the value.
     * @param mixed $value
     *            The value you want to set on the given header key.
     *
     * @return void
     */
    public function setHeader(string $key, $value): void {
        $totalHeaders = count($this->headers);
        $substrLength = strlen($key);
        for ($i = 0; $i < $totalHeaders; $i++) {
            if (substr($this->headers[$i], 0, $substrLength) === $key) {
                $this->headers[$i] = $key . ':' . $value;
                return;
            }
        }
        $this->headers[] = $key . ':' . $value;
    }

    /**
     * Add a new headers to the request.
     *
     * @param array $headers
     *            Headers to add to the request.
     *
     * @return void
     */
    public function setHeaders(array $headers): void {
        foreach ($headers as $header => $headerValue) {
            $this->setHeader($header, $headerValue);
        }
    }

    /**
     * Set form (POST) parameters on the request.
     *
     * @param array $data
     *            Array containing the values you want to set as POST parameters on the request.
     *
     * @return void
     */
    public function setData(array $data): void {
        $this->data = $data;
    }

    /**
     * Set the request body.
     *
     * @param string $body
     *
     * @return void
     */
    public function setBody(string $body): void {
        $this->body = trim($body);
    }

    /**
     * Set URL (GET) parameters on the request.
     *
     * @param array $params
     *            Array containing the values you want to set as GET parameters on the request.
     *
     * @return void
     */
    public function setParams(array $params): void {
        $this->params = $params;
    }

    /**
     * Set the cookies to send on the request.
     *
     * @param array $cookies
     *            Array containing the cookies you want to send on the request.
     *
     * @return void
     */
    public function setCookies(array $cookies): void {
        $this->cookies = $cookies;
    }

    private function setResultHeaders($curl, $headerLine) {
        $header = explode(':', $headerLine, 2);
        $header[0] = trim($header[0]);
        $headerName = strtolower($header[0]);
        if ($headerName === 'set-cookie' || $headerName === 'cookie') {
            $cookies = explode(';', $header[1]);
            foreach ($cookies as $cookie) {
                if (strpos($cookie, '=') !== false) {
                    list($cookieKey, $cookieValue) = explode('=', $cookie, 2);
                    $this->resultCookies[trim($cookieKey)] = trim($cookieValue);
                }
            }
        } elseif ($headerName === 'xkey') {
            $this->resultXkeyHeaders[] = trim($header[1]);
        } else {
            if (isset($header[1])) {
                $this->resultHeaders[$header[0]] = trim($header[1]);
            } else {
                $this->resultHeaders[] = $header[0];
            }
        }
        return strlen($headerLine); // Needed by curl
    }

    /**
     * Send the request to the setted URL.
     * The return will be an array with the following structure:
     * <ul>
     * <li>result -> the request content (body)</li>
     * <li>
     * status -> the request status information
     * <ul>
     * <li>code -> the request response code</li>
     * <li>message -> the request response message</li>
     * </ul>
     * </li>
     * </ul>
     *
     * @return array
     * @throws RequestHandlerException
     */
    public function send(): array {
        $urlWithParams = $this->getUrlWithParams();
        $flagName = 'request-time-' . $urlWithParams . '-' . uniqid();
        self::$timer->addFlag($flagName, true);
        $curl = $this->prepareCurl($urlWithParams);
        if (!empty($this->curlOptions)) {
            $curl = $this->addCurlOptions($curl);
        }
        $this->executeCurl($curl);
        $curlStatus = $this->getStatus();

        $logHeaders = $this->headers;
        foreach ($logHeaders as $key => $value) {
            if (strpos($value, 'Authorization:') === 0) {
                $logHeaders[$key] = 'Authorization:***';
            }
        }

        $log = [
            'status_code' => $curlStatus['code'],
            'status_message' => $curlStatus['message'],
            'url' => $urlWithParams,
            'code' => RequestHandlerLogger::REQUEST_START,
            'result' => '',
            'time_taken' => self::$timer->getElapsedTime($flagName),
            'body' => json_encode(preg_replace('/(["\']password["\']\s?:\s?["\'])(.*?)(["\'])/i', '$1$3', $this->body)),
            'cookies' => 'apiRequestCount:' . ApiRequest::getApiRequestCount() . ', request:' . json_encode($this->cookies),
            'data' => json_encode($this->data),
            'headers' => json_encode($logHeaders),
            'params' => json_encode($this->params)
        ];

        if (!isset($this->result)) {
            $log['error'] = $this->error;
            $log['code'] = RequestHandlerException::CURL_ERROR;
            $this->logger->error($this, $log);
            throw new RequestHandlerException(
                'ERROR calling "' . $urlWithParams . '" resource. Curl failure: ' . $this->error,
                RequestHandlerException::CURL_ERROR
            );
        }
        $log['cookies'] .= ', response:' . json_encode($this->resultCookies);

        $resultLen = strlen($this->result);

        if (
            $resultLen >= $this->maxResultLength && defined('LOGGER_LEVEL') && LOGGER_LEVEL === LoggerLevel::DEBUG
            && defined('DEBUGINFOLOGGER_ENABLED') && DEBUGINFOLOGGER_ENABLED
        ) {
            $parts = intdiv($resultLen, $this->maxResultLength) + (($resultLen % $this->maxResultLength > 0) ? 1 : 0);
            $sendParts = 0;
            while ($sendParts < $parts) {
                $sendParts += 1;
                $log['result'] =  'Part ' . $sendParts . ' of ' .  $parts . ': ' . substr($this->result, $this->maxResultLength * ($sendParts - 1), $this->maxResultLength);
                $this->logger->debug($this, $log);
            }
        } else {
            $log['result'] = substr($this->result, 0, $this->maxResultLength);
            $this->logger->info($this, $log);
        }

        return [
            'result' => $this->result,
            'headers' => $this->resultHeaders,
            'cookies' => $this->resultCookies,
            'xkeyHeaders' => $this->resultXkeyHeaders,
            'status' => $curlStatus,
            'url' => $urlWithParams
        ];
    }

    private function prepareCurl(string $urlWithParams): CurlHandle {
        $curl = curl_init($urlWithParams);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2TLS);
        curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($curl, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADERFUNCTION, [&$this, 'setResultHeaders']);
        if (!empty($this->cookies)) {
            $cookiesStringToPass = '';
            foreach ($this->cookies as $name => $value) {
                if (strlen($cookiesStringToPass) !== 0) {
                    $cookiesStringToPass  .= ';';
                }
                $cookiesStringToPass .= $name . '=' . addslashes($value);
            }
            curl_setopt($curl, CURLOPT_COOKIE, $cookiesStringToPass);
        }
        if (!empty($this->headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
        }
        if ($this->method === MethodType::POST || $this->method === MethodType::PUT || $this->method === MethodType::DELETE) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->method);
            $this->setCurlMethodData($curl);
        }
        return $curl;
    }

    private function addCurlOptions(CurlHandle $curl): CurlHandle {
        foreach ($this->curlOptions as $curlOptionName => $curlOptionValue) {
            curl_setopt($curl, $curlOptionName, $curlOptionValue);
        }
        return $curl;
    }

    private function setCurlMethodData($curl): void {
        if (!empty($this->data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->data);
        } elseif (strlen($this->body)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->body);
            $this->setHeader('Content-Length', strlen($this->body));
        }
    }

    private function executeCurl($curl): void {
        $result = curl_exec($curl);
        if (is_string($result)) {
            $this->result = $result;
        } else {
            $this->error = curl_error($curl);
        }
        $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        foreach ($this->curlInfo as $option) {
            $this->info[$option] = curl_getinfo($curl, $option);
        }
        curl_close($curl);
    }

    /**
     * Sets curl info options that will be store when sends the request 
     * 
     * @param array $options
     */
    public function setCurlInfoOptions(array $options): void {
        $this->curlInfo = $options;
    }

    /**
     * Sets curl options that will be store in the request 
     * 
     * @param array $options
     */
    public function setCurlOptions(array $options): void {
        $this->curlOptions = $options;
    }

    /**
     * Returns curl information options that were stored when the request was sent
     * 
     * @return array
     */
    public function getCurlInfo(): array {
        return $this->info;
    }

    /**
     * Returns curl options that were stored before the request was sent
     * 
     * @return array
     */
    public function getCurlOptions(): array {
        return $this->curlOptions;
    }

    public static function getStatusCodes(): array {
        return [
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing',
            103 => 'Early Hints',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            207 => 'Multi-Status',
            208 => 'Already Reported',
            226 => 'IM Used',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            308 => 'Permanent Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            418 => 'I\'m a teapot',
            419 => 'Authentication Timeout',
            420 => 'Enhance Your Calm',
            422 => 'Unprocessable Entity',
            423 => 'Locked',
            424 => 'Failed Dependency',
            424 => 'Method Failure',
            425 => 'Unordered Collection',
            426 => 'Upgrade Required',
            428 => 'Precondition Required',
            429 => 'Too Many Requests',
            431 => 'Request Header Fields Too Large',
            444 => 'No Response',
            449 => 'Retry With',
            450 => 'Blocked by Windows Parental Controls',
            451 => 'Unavailable For Legal Reasons',
            494 => 'Request Header Too Large',
            495 => 'Cert Error',
            496 => 'No Cert',
            497 => 'HTTP to HTTPS',
            499 => 'Client Closed Request',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            506 => 'Variant Also Negotiates',
            507 => 'Insufficient Storage',
            508 => 'Loop Detected',
            509 => 'Bandwidth Limit Exceeded',
            510 => 'Not Extended',
            511 => 'Network Authentication Required',
            598 => 'Network read timeout error',
            599 => 'Network connect timeout error'
        ];
    }

    /**
     * Auto-invoked using echo or concatenations. Useful to log requests.
     *
     * @return string
     */
    public function __toString(): string {
        $string = __CLASS__ .
            ': [METHOD: ' . $this->method . ']'
            . ' - [STATUS_CODE: ' . $this->getStatus()['code'] . ']'
            . ' - [URL: ' . $this->url . ']';
        if (isset($this->error)) {
            $string .= ' - [ERROR: ' . $this->error . ']';
        }
        return $string;
    }
}
