<?php

declare(strict_types=1);

namespace SDK\Core\Resources;

use SDK\Core\Application;
use SDK\Core\Enums\Resource;
use SDK\Core\Exceptions\ApiRequestException;

/**
 * This is the ApiRequest class in the LogiCommerce SDK package.
 * All LogiCommerce API Requests
 * are prepared and executed through this class.
 *
 * @see ApiRequest::__construct()
 * @see ApiRequest::setToken()
 * @see ApiRequest::setHeader()
 * @see ApiRequest::setData()
 * @see ApiRequest::setBody()
 * @see ApiRequest::setParams()
 * @see ApiRequest::send()
 *
 * @package SDK\Core\Resources
 */
final class ApiRequest {

    private RequestHandler $request;

    public const BASKET_TOKEN = 'basketToken';

    public const BOF_PREVIEW = 'bofPreview';

    private static ?string $apiUrl = null;

    private bool $useXTtl = true;

    private ?string $requestPath = null;

    private static int $apiRequestCount = 0;

    private static int $apiRequestContentLength = 0;

    /**
     * Constructor.
     * This will prepare the object to made the API request.
     * By default the method add the following headers:
     * <ul>
     * <li>Content-Type</li>
     * <li>Accept</li>
     * </ul>
     * That headers could be overwrited adding them on the $data param
     *
     * @param string $path
     *            API resource to call
     * @param string $method
     *            HTTP method
     * @param array $headers
     *            headers to add into the curl request
     * @param array $data
     *            data to add into the curl request as form (POST) parameters
     * @param string $apiUrl
     *            The URL of the API we want to do the request on
     */
    public function __construct(string $path, string $method = 'get', array $headers = [], array $data = [], ?string $apiUrl = null) {
        if ($path === Resource::BATCH) {
            $this->useXTtl = false;
        }
        $this->requestPath = self::getApiURL($apiUrl) . $path;
        $this->request = new RequestHandler($this->requestPath, $method);

        $apiTimeout = Server::get('HTTP_API_TIMEOUT') ?? (defined('API_TIMEOUT') ? API_TIMEOUT : null);
        if (!is_null($apiTimeout)) {
            $this->request->setTimeout(intval($apiTimeout));
        }
        // default values to this headers
        if (!isset($headers['Content-Type'])) {
            $headers['Content-Type'] = 'application/json';
        }
        if (!isset($headers['Accept'])) {
            $headers['Accept'] = 'application/json';
        }
        $this->setToken();
        $this->setBasketToken();
        $this->setBofPreview();
        $this->setHeaders($headers);
        $this->setCookies(Cookie::getAll());
        $this->setData($data);
        $this->request->setUserAgent('PHP SDK for LogiCommerce');
    }

    public static function getApiURL(?string $apiUrl = null): string {
        if (!is_null($apiUrl)) {
            return $apiUrl;
        } elseif (is_null(self::$apiUrl)) {
            self::$apiUrl = Server::get('HTTP_API_URL') ?? Environment::get('API_URL');
            $apiPort = Server::get('HTTP_API_URL_PORT') ?? Environment::get('API_URL_PORT');
            if (!is_null($apiPort) && is_numeric($apiPort)) {
                self::$apiUrl .= ':' . $apiPort;
            }
        }
        return self::$apiUrl;
    }

    /**
     * Get the application token and set it to the request.
     *
     * @return void
     */
    public function setToken(): void {
        $application = Application::getInstance();
        if (!is_null($application) && !$application->hasInValidData()) {
            $this->setHeader('Authorization', 'bearer ' . $application->getToken());
        } else {
            $this->setHeaders([
                'X-App-Id' => Environment::get('APP_ID'),
                'X-App-Key' => Environment::get('APP_KEY')
            ]);
        }
    }

    /**
     * Set the basketToken as header if setted
     *
     * @return void
     */
    private function setBasketToken(): void {
        if (Cookie::exist(self::BASKET_TOKEN)) {
            $this->setHeader(self::BASKET_TOKEN, Cookie::get(self::BASKET_TOKEN));
        }
    }

    /**
     * Set the bofPreview as header if setted
     *
     * @return void
     */
    private function setBofPreview(): void {
        if (isset($_GET[self::BOF_PREVIEW])) {
            $this->setHeader(self::BOF_PREVIEW, strip_tags($_GET[self::BOF_PREVIEW]));
        }
    }

    /**
     * Set headers on the API request.
     * These headers will be send with the API petition
     *
     * @param string $key
     *            Name of the header you want to set the value.
     * @param mixed $value
     *            The value you want to set on the given header key.
     *
     * @return void
     */
    public function setHeader(string $key, $value): void {
        $this->request->setHeader($key, $value);
    }

    private function setHeaders(array $headers): void {
        $this->request->setHeaders($headers);
    }

    /**
     * Set form (POST) parameters on the API request.
     * These data will be send with the API petition
     *
     * @param array $data
     *            Array containing the values you want to set as POST parameters on the request.
     * @return void
     */
    public function setData(array $data): void {
        $this->request->setData($data);
    }

    /**
     * Set the API request body.
     *
     * @param string $body
     *
     * @return void
     */
    public function setBody(string $body): void {
        $this->request->setBody($body);
    }

    /**
     * Set URL (GET) parameters on the API request.
     * These parameters will be send with the API petition
     *
     * @param array $params
     *            Array containing the values you want to set as GET parameters on the request.
     * @return void
     */
    public function setParams(array $params): void {
        $this->request->setParams($params);
    }

    private function setCookies(array $cookies): void {
        unset($cookies['folcsId']);
        unset($cookies['Version']);
        $this->request->setCookies($cookies);
    }

    public static function addApiRequestCount(int $numOfRequests = 1) {
        self::$apiRequestCount += $numOfRequests;
    }

    public static function getApiRequestCount(): int {
        return self::$apiRequestCount;
    }

    public static function addApiRequestContentLength(int $contentLength) {
        self::$apiRequestContentLength += $contentLength;
    }

    public static function getApiRequestContentLength(): int {
        return self::$apiRequestContentLength;
    }

    /**
     * Send the request to the LogiCommerce API.
     * The return value will be a decode of the given API JSON
     *
     * @return array
     * @throws ApiRequestException
     */
    public function send(): array {
        $response = $this->request->send();

        if ($response['status']['code'] === 0) {
            throw new ApiRequestException("ERROR: Invalid url: {$response['url']}", ApiRequestException::INVALID_URL);
        } elseif ($response['status']['code'] >= 400 && $response['status']['code'] != 404) {
            VarnishManagement::setXttl(DEFAULT_ON_ERROR_TTL, 'ApiRequest->send status code error');
        }

        $result = null;
        if (is_string($response['result'])) {
            $result = $this->getJsonResult($response['result']);
        }

        if (is_null($result)) {
            throw new ApiRequestException("ERROR: Invalid result for url: {$response['url']}", ApiRequestException::INVALID_RESULT);
        }
        $this->saveCookies($response['cookies']);
        $this->saveXkeyHeaders($response['xkeyHeaders']);

        if ($this->useXTtl && isset($response['headers']['x-ttl'])) {
            VarnishManagement::setXttl($response['headers']['x-ttl'], $this->requestPath);
        }

        // $response['headers']['api-total-requests'] > 1 is a batch request
        if (isset($response['headers']['api-total-requests']) && is_numeric($response['headers']['api-total-requests']) && $response['headers']['api-total-requests'] == 1) {
            self::addApiRequestCount();
            if (isset($response['headers']['Content-Length']) && is_numeric($response['headers']['Content-Length'])) {
                self::addApiRequestContentLength(intval($response['headers']['Content-Length']));
            }
        }

        $response['result'] = $result;
        return $response;
    }

    private function saveCookies(array $cookies): void {
        foreach ($cookies as $cookieKey => $cookieValue) {
            if ($cookieKey !== 'token') { // don't override the token
                Cookie::set(trim($cookieKey), trim($cookieValue));
            }
        }
    }

    private function saveXkeyHeaders(array $xkeyHeaders): void {
        foreach ($xkeyHeaders as $xkey) {
            VarnishManagement::addXkeys(trim($xkey));
        }
    }

    private function getJsonResult(string $curlResult): ?array {
        $result = json_decode($curlResult, true);
        return is_array($result) ? $result : [];
    }
}
