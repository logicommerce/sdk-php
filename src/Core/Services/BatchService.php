<?php

declare(strict_types=1);

namespace SDK\Core\Services;

use SDK\Core\Builders\ErrorBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\Error;
use SDK\Core\Dtos\Request;
use SDK\Core\Enums\MethodType;
use SDK\Core\Enums\Resource;
use SDK\Core\Registry;
use SDK\Core\Resources\ApiRequest;
use SDK\Core\Resources\BatchRequests;
use SDK\Core\Resources\RequestHandler;
use SDK\Core\Resources\VarnishManagement;

/**
 * This is the batch requests service class.
 * This class will retrieve the batch requests needed and return them in the same order as they were requested.
 *
 * @see BatchService::send()
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Core\Services
 */
final class BatchService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::BATCH_MODEL;

    private const REQUEST_ID = 'requestId';

    private const STATUS = 'status';

    private const ERROR = 'error';

    /**
     * Returns the requests inside the BatchRequests object
     *
     * @param BatchRequests $batchRequests
     *
     * @return array
     */
    public function send(BatchRequests $batchRequests): array {
        ApiRequest::addApiRequestCount(count($batchRequests->getRequests()['requests']));
        if (count($batchRequests->getRequests()['requests']) === 0) {
            return [];
        } else if (count($batchRequests->getRequests()['requests']) === 1) {
            $request = $batchRequests->getRequests()['requests'][0];
            if (Resource::isCollectionResource($request['resource'])) {
                return [$request['requestId'] => $this->getResponse(parent::call((new RequestBuilder())->path($request['path'])->build()), $request['class'])];
            } else {
                return [$request['requestId'] => $this->prepareElement(parent::call((new RequestBuilder())->path($request['path'])->build()), $request['class'])];
            }
        } else {
            return $this->call((new RequestBuilder())->path(Resource::BATCH)->body($batchRequests->getRequests())->method(MethodType::POST)->build());
        }
    }

    protected function call(Request $request, string $apiUrl = null): array {
        $result = [];
        $callResults = parent::call($request, $apiUrl);
        if (isset($callResults[self::STATUS]) && $callResults[self::STATUS] >= 400) {
            VarnishManagement::setXttl(DEFAULT_ON_ERROR_TTL, 'BatchService->call result call status error');
            return [self::ERROR => new Error($callResults)];
        }
        $responses = $callResults['responses'] ?? [];
        $responses = $this->mergeData($responses, $request->getBody()['requests']);

        foreach ($responses as $key => $value) {
            $data = json_decode($value['body'] ?? '{}', true);
            $class = $value['class'] ?? '';
            $resource = $value['resource'] ?? '';
            $noData = is_null($data);
            if ((!isset($value[self::STATUS]) || $value[self::STATUS] >= 400) || $noData) {
                if ($noData) {
                    $data[self::ERROR] = (new ErrorBuilder())->message('Empty response on batch request')->build();
                } else {
                    $data[self::ERROR] = new Error($data);
                }
                if (isset($value[self::STATUS]) && $value[self::STATUS] != 404) {
                    VarnishManagement::setXttl(DEFAULT_ON_ERROR_TTL, 'BatchService->call responses key: ' . $key . ' status error. ' . $data[self::ERROR]->getMessage());
                }
            }
            $status = isset($value[self::STATUS]) ? $value[self::STATUS] : 444;
            $this->setBatchHeaders($value['headers'] ?? []);
            if (strlen($class) !== 0) {
                $result[$key] = $this->getData($data, $status, $class, $resource);
            }
        }
        return $result;
    }

    private function mergeData(array $responses, array $requests): array {
        return array_replace_recursive(
            array_combine(array_column($responses, self::REQUEST_ID), $responses),
            array_combine(array_column($requests, self::REQUEST_ID), $requests)
        );
    }

    private function getData(array $data, int $status, string $class, string $resource) {
        if (is_null($data) || empty($data)) {
            $response = null;
        }
        $data['httpStatus'] = [
            'code' => $status,
            'message' => RequestHandler::getStatusCodes()[$status] ?? 'Unknown'
        ];
        if (Resource::isCollectionResource($resource)) {
            $response = $this->getResponse($data, $class);
        } else {
            $response = $this->prepareElement($data, $class);
        }
        return $response;
    }

    private function setBatchHeaders(array $headers): void {
        $xttl = '';
        $origin = 'batch -> ' . (isset($headers['url']) ? $headers['url'][0] : 'Unknown');
        foreach ($headers as $name => $value) {
            $name = strtolower($name);
            if ($name === 'xkey') {
                foreach ($value as $xKey) {
                    VarnishManagement::addXkeys($xKey);
                }
            } elseif ($name === 'x-ttl') {
                $xttl = trim($value[0] ?? '');
            } elseif ($name === 'api-total-requests') {
                if (is_numeric($value[0])) {
                    ApiRequest::addApiRequestCount(intval($value[0]));
                }
            } elseif ($name === 'content-length') {
                if (is_numeric($value[0])) {
                    ApiRequest::addApiRequestContentLength(intval($value[0]));
                }
            }
        }
        VarnishManagement::setXttl($xttl, $origin);
    }
}
