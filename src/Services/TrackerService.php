<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\CacheTrait;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Common\Tracker;
use SDK\Services\Parameters\Groups\TrackerParametersGroup;

/**
 * This is the tracker service class.
 * This class will retrieve the trackers from LogiCommerce API and transform them to objects.
 * All the needed trackers operations previous to Framework must be done here.
 *
 * @see TrackerService::getTrackers()
 * @see Tracker
 *
 * @see TrackerService::addGetTrackers()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class TrackerService extends Service {
    use ServiceTrait, CacheTrait;

    private const REGISTRY_KEY = Registry::TRACKER_MODEL;

    /**
     * Returns the website available trackers
     *
     * @param TrackerParametersGroup $params
     *            object with the needed filters to send to the API trackers resource
     *
     * @return ElementCollection|NULL
     */
    public function getTrackers(TrackerParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Tracker::class, Resource::TRACKERS, $params);
    }

    /**
     * Add the request to get the website available trackers
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param TrackerParametersGroup $params
     *            object with the needed filters to send to the API trackers resource
     *
     * @return void
     */
    public function addGetTrackers(BatchRequests $batchRequests, string $batchName, TrackerParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::TRACKERS)->urlParams($params)->build()
        );
    }
}
