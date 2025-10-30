<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Enums\MethodType;
use SDK\Core\Exceptions\RequestException;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Resources\Url;

/**
 * This is the Request class.
 * The requests to make petitions by HTTP(s) will be prepared throught that class.
 *
 * @see Request::getPath()
 * @see Request::setPath()
 * @see Request::getMethod()
 * @see Request::setMethod()
 * @see Request::getPathParams()
 * @see Request::setPathParams()
 * @see Request::getUrlParams()
 * @see Request::setUrlParams()
 * @see Request::getFormParams()
 * @see Request::setFormParams()
 * @see Request::getBody()
 * @see Request::setBody()
 * @see Request::getHeaders()
 * @see Request::setHeaders()
 *
 * @package SDK\Core\Dtos
 */
class Request {

    protected string $path = '';

    protected string $method = MethodType::GET;

    protected array $pathParams = [];

    protected array $urlParams = [];

    protected array $formParams = [];

    protected array $body = [];

    protected array $headers = [];

    /**
     * Returns the request path.
     *
     * @return string
     */
    public function getPath(): string {
        return $this->path;
    }

    /**
     * Returns the request path with the pathParams replaced.
     *
     * @return string
     */
    public function getFullPath(): string {
        return Url::replaceWildcards($this->path, $this->pathParams);
    }

    /**
     * Sets the request path.
     *
     * @param string $path
     *
     * @return void
     */
    public function setPath(string $path): void {
        $this->path = $path;
    }

    /**
     * Returns the request method.
     *
     * @return string
     */
    public function getMethod(): string {
        return $this->method;
    }

    /**
     * Sets the request method.
     *
     * @param string $method
     *            Must be a valid method (given in the MethodType enumerate)
     *
     * @return void
     * @throws RequestException
     */
    public function setMethod(string $method): void {
        if (!MethodType::isValid($method)) {
            throw new RequestException('Invalid method ' . $method, RequestException::INVALID_METHOD);
        }
        $this->method = $method;
    }

    /**
     * Returns the request path parameters.
     *
     * @return array
     */
    public function getPathParams(): array {
        return $this->pathParams;
    }

    /**
     * Sets the request path parameters.
     *
     * @param mixed $pathParams
     *            An instance of ParametersGroup or an array. Something else will throw an exception.
     *
     * @return void
     * @throws RequestException
     */
    public function setPathParams($pathParams): void {
        $this->pathParams = $this->getParams($pathParams);
    }

    /**
     * Returns the request URL parameters.
     *
     * @return array
     */
    public function getUrlParams(): array {
        return $this->urlParams;
    }

    /**
     * Sets the request URL (the ones sent by GET) parameters.
     *
     * @param mixed $urlParams
     *            An instance of ParametersGroup or an array. Something else will throw an exception.
     *
     * @return void
     * @throws RequestException
     */
    public function setUrlParams($urlParams): void {
        $this->urlParams = $this->getParams($urlParams);
    }

    /**
     * Returns the request form parameters.
     *
     * @return array
     */
    public function getFormParams(): array {
        return $this->formParams;
    }

    /**
     * Sets the request form (the ones sent by POST) parameters.
     *
     * @param mixed $formParams
     *            An instance of ParametersGroup or an array. Something else will throw an exception.
     *
     * @return void
     * @throws RequestException
     */
    public function setFormParams($formParams): void {
        $this->formParams = $this->getParams($formParams);
    }

    /**
     * Returns the request body.
     *
     * @return array
     */
    public function getBody(): array {
        return $this->body;
    }

    /**
     * Sets the request body.
     *
     * @param mixed $body
     *            An instance of ParametersGroup or an array. Something else will throw an exception.
     *
     * @return void
     * @throws RequestException
     */
    public function setBody($body): void {
        $this->body = $this->getParams($body);
    }

    /**
     * Returns the request headers.
     *
     * @return array
     */
    public function getHeaders(): array {
        return $this->headers;
    }

    /**
     * Sets the request headers.
     *
     * @param array $headers
     *
     * @return void
     */
    public function setHeaders(array $headers): void {
        $this->headers = $headers;
    }

    /**
     * Add a header to request headers.
     *
     * @param string $key
     *            Name of the header you want to set the value.
     * @param mixed $value
     *            The value you want to set on the given header key.
     *
     * @return void
     */
    public function setHeader(string $key, $value): void {
        $this->headers[$key] = $value;
    }

    private function getParams($parameters): array {
        if ($parameters instanceof ParametersGroup) {
            $parameters = $this->paramsToArray($parameters);
        }
        if (is_array($parameters)) {
            return $parameters;
        }
        throw new RequestException('Invalid parameters', RequestException::INVALID_PARAMETERS);
    }

    public function toArray(): array {
        $request = [
            'path' => $this->getFullPath() . $this->encodeUrlParams($this->urlParams),
            'method' => $this->method
        ];
        if (!empty($this->body)) {
            $request['body'] = json_encode($this->body);
        }
        if (!empty($this->headers)) {
            $request['headers'] = $this->headers;
        }
        return $request;
    }

    private function paramsToArray(ParametersGroup $parameters = null): ?array {
        if (is_null($parameters)) {
            return null;
        }
        return $parameters->toArray();
    }

    /**
     * Returns the request URL with all of the setted URL (GET) parameters
     *
     * @return string
     */
    private function encodeUrlParams(?array $parameters = []): string {
        if (!is_null($parameters) && !empty($parameters)) {
            return Url::encodeParams($parameters);
        }
        return '';
    }
}
