<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\CacheTrait;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\PhysicalLocation;
use SDK\Services\Parameters\Groups\PhysicalLocationParametersGroup;

/**
 * This is the physical locations service class.
 * This class will retrieve the physical locations from LogiCommerce API and transform them to objects.
 * All the needed physical locations operations previous to Framework must be done here.
 *
 * @see PhysicalLocationsService::getPhysicalLocations()
 * @see PhysicalLocation
 *
 * @see PhysicalLocationsService::addGetPhysicalLocations()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class PhysicalLocationsService extends Service {
    use ServiceTrait, CacheTrait;

    private const REGISTRY_KEY = Registry::PHYSICAL_LOCATIONS_MODEL;

    /**
     * Returns the available physical locations filtered with the given parameters
     *
     * @param PhysicalLocationParametersGroup $params
     *            object with the needed filters to send to the API physical locations resource
     *
     * @return ElementCollection|NULL
     */
    public function getPhysicalLocations(PhysicalLocationParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(PhysicalLocation::class, Resource::PHYSICAL_LOCATIONS, $params);
    }

    /**
     * Add the request to get the available physical locations filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param PhysicalLocationParametersGroup $params
     *            object with the needed filters to send to the API physical locations resource
     *
     * @return void
     */
    public function addGetPhysicalLocations(
        BatchRequests $batchRequests,
        string $batchName,
        PhysicalLocationParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::PHYSICAL_LOCATIONS)->urlParams($params)->build()
        );
    }
}
