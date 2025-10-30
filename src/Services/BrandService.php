<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\Brand;
use SDK\Services\Parameters\Groups\BrandParametersGroup;

/**
 * This is the brand service class.
 * This class will retrieve the brands from LogiCommerce API and transform them to objects.
 * All the needed brand operations previous to Framework must be done here.
 *
 * @see BrandService::getBrands()
 * @see BrandService::getBrand()
 * @see Brand
 *
 * @see BrandService::addGetBrands()
 * @see BrandService::addGetBrand()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class BrandService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::BRAND_MODEL;

    /**
     * Returns the brands filtered with the given parameters
     *
     * @param BrandParametersGroup $params
     *            object with the needed filters to send to the API brands resource
     *
     * @return ElementCollection|NULL
     */
    public function getBrands(BrandParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Brand::class, Resource::BRANDS, $params);
    }

    /**
     * Returns the brand identified by the given id
     *
     * @param int $id
     *
     * @return Brand|NULL
     */
    public function getBrand(int $id = 0): ?Brand {
        return $this->getElement(Brand::class, Resource::BRANDS_ID, $id);
    }

    /**
     * Add the request to get the brands filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param BrandParametersGroup $params
     *            object with the needed filters to send to the API brands resource
     *
     * @return void
     */
    public function addGetBrands(BatchRequests $batchRequests, string $batchName, BrandParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BRANDS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the brand identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetBrand(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BRANDS_ID)->pathParams(['id' => $id])->build()
        );
    }
}
