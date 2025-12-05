<?php

declare(strict_types=1);

namespace SDK\Core\Resources;

use SDK\Core\Dtos\BatchRequest;
use SDK\Core\Enums\MethodType;
use SDK\Core\Enums\Resource;
use SDK\Core\Exceptions\BatchRequestException;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;

/**
 * This is the BatchRequest class in the LogiCommerce SDK package.
 * All LogiCommerce API Requests
 * are prepared and executed through this class.
 *
 * @see BatchRequests::addRequest()
 *
 * @package SDK\Core\Resources
 */
final class BatchRequests {

    private array $requests = [];

    private array $names = [];

    /**
     * This will made a curl petition to the given API resource with the metod PUT.
     * The return will be the deserialized API response.
     *
     * @param string $name
     *            The name the request will have
     * @param string $path
     *            API resource to call
     * @param string $method
     *            The method the call will use for this request
     * @param array $pathParams
     *            parameters to replace on the path
     * @param ParametersGroup|array $parameters
     *            parameters to add into the request request as URL (GET) params
     * @param ParametersGroup $body
     *            body request in array format. Will be parsed to json
     * @param array $headers
     *            headers to add into the request request
     *
     * @return array
     */
    public function addRequest(BatchRequest $request, bool $isMapping = false, string $getClassPath = ''): void {
        $requestId = $request->getRequestId();
        $this->checkRequestId($requestId);
        $this->checkMethod($request->getMethod());

        $path = $request->getPath();
        $class = Resource::getClass($getClassPath === '' ? $path : $getClassPath, $isMapping);
        $this->checkClass($class, $path);

        $request = $request->toArray();
        $this->checkPathParams($request['path']);

        $request['resource'] = Resource::getConstantResource($path);
        $request['class'] = $class;

        $this->requests[] = $request;
        $this->names[$requestId] = true;
    }

    /**
     * Returns the requests on this object
     *
     * @return array
     */
    public function getRequests(): array {
        return [
            'requests' => $this->requests,
        ];
    }

    private function checkRequestId(string $requestId): void {
        if (strlen($requestId) === 0) {
            throw new BatchRequestException('Requests must be identified', BatchRequestException::IDENTIFIER_REQUIRED);
        } elseif (isset($this->names[$requestId])) {
            throw new BatchRequestException('Request identifier "' . $requestId . '" already in use', BatchRequestException::IDENTIFIER_ALREADY_IN_USE);
        }
    }

    private function checkMethod(string $method): void {
        if ($method !== MethodType::GET) {
            throw new BatchRequestException('Invalid method. Only get calls are available', BatchRequestException::INVALID_REQUEST_METHOD);
        }
    }

    private function checkClass(?string $class, string $path): void {
        if (is_null($class)) {
            throw new BatchRequestException('Request "' . $path . '" has no assigned class', BatchRequestException::INVALID_REQUEST);
        }
    }

    private function checkPathParams(string $path): void {
        if (strrpos($path, '{') !== false) {
            throw new BatchRequestException(
                'Required pathParams for request "' . $path . '" not sent',
                BatchRequestException::INVALID_URL_PARAMS
            );
        }
    }
}
