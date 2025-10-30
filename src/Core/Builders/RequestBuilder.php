<?php declare(strict_types=1);

namespace SDK\Core\Builders;

use SDK\Core\Dtos\Request;

/**
 * This is the builder to create Request DTOs.
 *
 * @see RequestBuilder::path()
 * @see RequestBuilder::method()
 * @see RequestBuilder::pathParams()
 * @see RequestBuilder::urlParams()
 * @see RequestBuilder::formParams()
 * @see RequestBuilder::body()
 * @see RequestBuilder::headers()
 * @see RequestBuilder::build()
 *
 * @package SDK\Core\Builders
 */
class RequestBuilder {

    protected ?string $path = null;

    protected ?string $method = null;

    protected $pathParams = null;

    protected $urlParams = null;

    protected $formParams = null;

    protected $body = null;

    protected ?array $headers = null;

    /**
     * Sets the path.
     *
     * @param string $path
     *
     * @return RequestBuilder
     */
    public function path(string $path): RequestBuilder {
        $this->path = $path;
        return $this;
    }

    /**
     * Sets the method.
     *
     * @param string $method
     *            Must be a valid method (given in the MethodType enumerate)
     *
     * @return RequestBuilder
     */
    public function method(string $method): RequestBuilder {
        $this->method = $method;
        return $this;
    }

    /**
     * Sets the path parameters.
     *
     * @param mixed $pathParams
     *            An instance of ParametersGroup or an array.
     *
     * @return RequestBuilder
     */
    public function pathParams($pathParams): RequestBuilder {
        $this->pathParams = $pathParams;
        return $this;
    }

    /**
     * Sets the URL (the ones sent by GET) parameters.
     *
     * @param mixed $urlParams
     *            An instance of ParametersGroup or an array.
     *
     * @return RequestBuilder
     */
    public function urlParams($urlParams): RequestBuilder {
        $this->urlParams = $urlParams;
        return $this;
    }

    /**
     * Sets the form (the ones sent by POST) parameters.
     *
     * @param mixed $formParams
     *            An instance of ParametersGroup or an array.
     *
     * @return RequestBuilder
     */
    public function formParams($formParams): RequestBuilder {
        $this->formParams = $formParams;
        return $this;
    }

    /**
     * Sets the body.
     *
     * @param mixed $body
     *            An instance of ParametersGroup or an array.
     *
     * @return RequestBuilder
     */
    public function body($body): RequestBuilder {
        $this->body = $body;
        return $this;
    }

    /**
     * Sets the headers.
     *
     * @param array $headers
     *
     * @return RequestBuilder
     */
    public function headers(array $headers): RequestBuilder {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Returns the created batch request.
     *
     * @return Request
     */
    public function build(): Request {
        return $this->fillRequest(new Request());
    }

    protected function fillRequest(Request $request): Request {
        if (!is_null($this->path)) {
            $request->setPath($this->path);
        }
        if (!is_null($this->method)) {
            $request->setMethod($this->method);
        }
        if (!is_null($this->pathParams)) {
            $request->setPathParams($this->pathParams);
        }
        if (!is_null($this->urlParams)) {
            $request->setUrlParams($this->urlParams);
        }
        if (!is_null($this->formParams)) {
            $request->setFormParams($this->formParams);
        }
        if (!is_null($this->body)) {
            $request->setBody($this->body);
        }
        if (!is_null($this->headers)) {
            $request->setHeaders($this->headers);
        }
        return $request;
    }
}
