<?php

namespace SDK\Core\Resources;

use Error;
use SDK\Core\Resources\Timer;
use SDK\Core\Resources\Connection;
use SDK\Core\Resources\Loggers\ConnectionLogger;
use SDK\Core\Resources\RequestHandler;

/**
 * This is the HttpRequest class.
 * This class is the responsible to execute http requests.
 *
 * @see HttpRequest::__construct()
 * @see HttpRequest::setTimeout()
 * @see HttpRequest::setUserAgent()
 * @see HttpRequest::setHeaders()
 * @see HttpRequest::setData()
 * @see HttpRequest::setBody()
 * @see HttpRequest::setParams()
 * @see HttpRequest::setCookies()
 * @see HttpRequest::setCurlOptions()
 * @see HttpRequest::send()
 *
 * @package FWK\Core\Resources
 */
class HttpRequest {

    protected ?ConnectionLogger $connectionLogger = null;

    protected ?RequestHandler $requestHandler = null;

    protected string $url = '';

    protected string $method = '';

    /**
     * Constructor.
     * This will prepare the object to made the request.
     *
     * @param string $url
     *            request URL to call
     * @param string $method
     *            HTTP method
     */
    public function __construct(string $url, string $method = 'get') {
        $this->connectionLogger = ConnectionLogger::getInstance();
        $this->url = $url;
        $this->method = $method;
        $this->requestHandler = new RequestHandler($this->url, $this->method);
    }

    /**
     * Set the request timeout (the maximum time the request will wait for response).
     *
     * @param int $timeout
     *
     * @return void
     */
    public function setTimeout(int $timeout): void {
        $this->requestHandler->setTimeout($timeout);
    }

    /**
     * Set the request user-agent.
     *
     * @param string $userAgent
     *
     * @return void
     */
    public function setUserAgent(string $userAgent): void {
        $this->requestHandler->setUserAgent($userAgent);
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
        $this->requestHandler->setHeader($key, $value);
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
        $this->requestHandler->setHeaders($headers);
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
        $this->requestHandler->setData($data);
    }

    /**
     * Set the request body.
     *
     * @param string $body
     *
     * @return void
     */
    public function setBody(string $body): void {
        $this->requestHandler->setBody($body);
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
        $this->requestHandler->setParams($params);
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
        $this->requestHandler->setCookies($cookies);
    }

    /**
     * Sets curl info options that will be store when sends the request 
     * 
     * @param array $options
     */
    public function setCurlInfoOptions(array $options): void {
        $this->requestHandler->setCurlInfoOptions($options);
    }

    /**
     * Set the curl options.
     *
     * @param array $options
     *
     * @return void
     */
    public function setCurlOptions(array $options): void {
        $this->requestHandler->setCurlOptions($options);
    }

    /**
     * Returns curl information options that were stored when the request was sent
     * 
     * @return array
     */
    public function getInfo(): array {
        return $this->requestHandler->getCurlInfo();
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
        $timerUid = $this->url . '-' . uniqid();
        $timer = Timer::getTimer('httpRequest-' . $timerUid);
        $timer->start();
        $flagName = 'connection-time-' . $timerUid;
        $timer->addFlag($flagName, true);
        $response = $this->requestHandler->send();
        $logData = [
            'method' => $this->method,
            'path' => parse_url($this->url, PHP_URL_PATH),
            'time_taken' => $timer->getElapsedTime($flagName),
            'api_url' => $this->url
        ];
        if ($response[Connection::STATUS][Connection::CODE] >= 400) {
            $error = new Error($response[Connection::RESULT]);
            $this->connectionLogger->warning(
                'API REQUEST: [METHOD: ' . $this->method . '] - [URL: ' . $this->url . '] - [ERROR: ' . $error . ']',
                $logData + [
                    Connection::CODE => ConnectionLogger::CONNECTION_ERROR,
                    'error' => $error
                ]
            );
        } else {
            $this->connectionLogger->info(
                'API REQUEST: [METHOD: ' . $this->method . '] - [URL: ' . $this->url . ']',
                $logData + [
                    Connection::CODE => ConnectionLogger::CONNECTION_INFO
                ]
            );
        }
        return $response;
    }
}
