<?php

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Enums\Resource;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Core\Services\CacheTrait;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Dtos\Kimera\KimeraDataRequest;

class KimeraService extends Service {
    use ServiceTrait, CacheTrait;

    private const REGISTRY_KEY = Registry::KIMERA_MODEL;

    /**
     * Kimera data reguest
     *
     * @return KimeraDataRequest|NULL
     */
    public function getData(): ?KimeraDataRequest {
        $response = $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::KIMERA_DATA)->method(self::GET)->build()),
            KimeraDataRequest::class
        );
        return $response;
    }

    /**
     * Add the request to get the kimera data.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetData(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::KIMERA_DATA)->build()
        );
    }
}
