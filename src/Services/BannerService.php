<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\Banner;
use SDK\Services\Parameters\Groups\BannerParametersGroup;

/**
 * This is the banner service class.
 * This class will retrieve the banners from LogiCommerce API and transform them to objects.
 * All the needed banner operations previous to Framework must be done here.
 *
 * @see BannerService::getBanners()
 * @see BannerService::getBanner()
 * @see BannerService::doneClick()
 * @see Banner
 *
 * @see BannerService::addGetBanners()
 * @see BannerService::addGetBanner()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class BannerService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::BANNER_MODEL;

    /**
     * Returns the banners filtered with the given parameters
     *
     * @param BannerParametersGroup $params
     *            object with the needed filters to send to the API banners resource
     *
     * @return ElementCollection|NULL
     */
    public function getBanners(BannerParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Banner::class, Resource::BANNERS, $params);
    }

    /**
     * Returns the banner identified by the given id
     *
     * @param int $id
     *
     * @return Banner|NULL
     */
    public function getBanner(int $id = 0): ?Banner {
        return $this->getElement(Banner::class, Resource::BANNERS_ID, $id);
    }

    /**
     * Increase the banner click counter
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function doneClick(int $id = 0): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BANNERS_ID_DONE_CLICK)->pathParams(['id' => $id])->method(self::POST)->build()
            ),
            Status::class
        );
    }

    /**
     * Add the request to get the banners filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param BannerParametersGroup $params
     *            object with the needed filters to send to the API banners resource
     *
     * @return void
     */
    public function addGetBanners(BatchRequests $batchRequests, string $batchName, BannerParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BANNERS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the banner identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetBanner(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BANNERS_ID)->pathParams(['id' => $id])->build()
        );
    }
}
