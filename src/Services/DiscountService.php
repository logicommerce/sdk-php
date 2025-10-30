<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\Discount;
use SDK\Dtos\Catalog\Product\Product;
use SDK\Services\Parameters\Groups\DiscountSelectableGiftsParametersGroup;
use SDK\Services\Parameters\Groups\DiscountsParametersGroup;

/**
 * This is the discounts service class.
 * This class will retrieve the legal texts from LogiCommerce API and transform them to objects.
 * All the needed trackers operations previous to Framework must be done here.
 *
 * @see DiscountService::getDiscounts()
 * @see DataText
 *
 * @see DiscountService::addGetDiscounts()
 * @see BatchRequests
 *
 * @uses ServiceTrait
 *
 * @package SDK\Services
 */
class DiscountService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::DISCOUNT_MODEL;

    /**
     * Returns the discounts filtered with the given parameters
     *
     * @param DiscountsParametersGroup $params
     *            object with the needed filters to send to the API discounts resource
     *
     * @return ElementCollection|NULL
     */
    public function getDiscounts(DiscountsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Discount::class, Resource::DISCOUNTS, $params);
    }

    /**
     * Returns the discount selectable gifts products filtered with the given parameters
     *
     * @param DiscountSelectableGiftsParametersGroup $params
     *            object with the needed filters to send to the API discounts resource
     *
     * @return ElementCollection|NULL
     */
    public function getDiscountSelectableGiftsIdProducts(int $id, DiscountSelectableGiftsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Product::class, $this->replaceWildcards(Resource::DISCOUNT_SELECTABLE_GIFTS_ID_PRODUCTS, ['id' => $id]), $params);
    }

    /**
     * Add the request to get the discounts filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param DiscountsParametersGroup $params
     *            object with the needed filters to send to the API discounts resource
     *
     * @return ElementCollection|NULL
     */
    public function addGetDiscounts(BatchRequests $batchRequests, string $batchName, DiscountsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::DISCOUNTS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the discount selectable gifts products filtered with the given parameters
     *
     * @param DiscountSelectableGiftsParametersGroup $params
     *            object with the needed filters to send to the API discounts resource
     *
     * @return ElementCollection|NULL
     */
    public function addGetDiscountSelectableGiftsIdProducts(BatchRequests $batchRequests, string $batchName, int $id = 0, DiscountSelectableGiftsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::DISCOUNT_SELECTABLE_GIFTS_ID_PRODUCTS)->pathParams(['id' => $id])
                ->urlParams($params)
                ->build()
        );
    }
}
