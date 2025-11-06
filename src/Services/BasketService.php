<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Application;
use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\CustomTag;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Factories\BasketDeliveryFactory;
use SDK\Core\Enums\Resource;
use SDK\Core\Exceptions\InvalidParameterException;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Basket\Basket;
use SDK\Dtos\Basket\ResponseAddFillProductCollection;
use SDK\Dtos\Catalog\Linked;
use SDK\Dtos\Catalog\RelatedItems;
use SDK\Core\Dtos\Factories\PaymentSystemFactory;
use SDK\Core\Services\Parameters\Factories\UserToAccountFactory;
use SDK\Dtos\Basket\Attachment;
use SDK\Dtos\Basket\BasketLockedStockTimers;
use SDK\Dtos\Basket\BasketPickingDelivery;
use SDK\Dtos\Basket\BasketShippingDelivery;
use SDK\Dtos\Basket\LockedStocksAggregateData;
use SDK\Dtos\Basket\ResponseSetRows;
use SDK\Dtos\UrlResponse;
use SDK\Enums\RelatedItemsType;
use SDK\Services\Parameters\Groups\Account\UpdateOmsBasketCustomerParametersGroup;
use SDK\Services\Parameters\Groups\Basket\AddBundleParametersGroup;
use SDK\Services\Parameters\Groups\Basket\AddGiftParametersGroup;
use SDK\Services\Parameters\Groups\Basket\AddLinkedParametersGroup;
use SDK\Services\Parameters\Groups\Basket\AddProductParametersGroup;
use SDK\Services\Parameters\Groups\Basket\AddProductsParametersGroup;
use SDK\Services\Parameters\Groups\Basket\AttachmentParametersGroup;
use SDK\Services\Parameters\Groups\Basket\BasketCustomTagsParametersGroup;
use SDK\Services\Parameters\Groups\Basket\DeleteRowsParametersGroup;
use SDK\Services\Parameters\Groups\Basket\DeliveriesParametersGroup;
use SDK\Services\Parameters\Groups\Basket\EditBasketCustomTagsParametersGroup;
use SDK\Services\Parameters\Groups\Basket\EditBundleParametersGroup;
use SDK\Services\Parameters\Groups\Basket\EditLinkedParametersGroup;
use SDK\Services\Parameters\Groups\Basket\EditPaymentSystemParametersGroup;
use SDK\Services\Parameters\Groups\Basket\EditProductParametersGroup;
use SDK\Services\Parameters\Groups\Basket\EditShipmentsParametersGroup;
use SDK\Services\Parameters\Groups\Basket\ExpressCheckoutValidateParametersGroup;
use SDK\Services\Parameters\Groups\Basket\LockedStocksAggregateDataParametersGroup;
use SDK\Services\Parameters\Groups\Basket\ProductRowPinnedRequestParametersGroup;
use SDK\Services\Parameters\Groups\Basket\ProviderPickupPointPickingDeliveriesParametersGroup;
use SDK\Services\Parameters\Groups\Basket\RewardPointsRedeemParametersGroup;
use SDK\Services\Parameters\Groups\Basket\SetBasketAddressesBookParametersGroup;
use SDK\Services\Parameters\Groups\Basket\SetRowsParametersGroup;
use SDK\Services\Parameters\Groups\Basket\UpdateLockedStockTimerParametersGroup;
use SDK\Services\Parameters\Groups\CustomTagsParametersGroup;
use SDK\Services\Parameters\Groups\LinkedParametersGroup;
use SDK\Services\Parameters\Groups\PluginAccountIdParametersGroup;
use SDK\Services\Parameters\Groups\RelatedItemsParametersGroup;
use SDK\Services\Parameters\Validators\Basket\HashParametersValidator;
use SDK\Services\Parameters\Validators\Basket\UIdParametersValidator;

/**
 * This is the basket service class.
 * This class will retrieve the baskets from LogiCommerce API and transform them to objects.
 * All the needed baskets operations previous to Framework must be done here.
 *
 * @see BasketService::addBundle()
 * @see BasketService::addProduct()
 * @see BasketService::addVoucherCode()
 * @see BasketService::clear()
 * @see BasketService::comment()
 * @see BasketService::deleteRow()
 * @see BasketService::deleteVoucherCode()
 * @see BasketService::editBundle()
 * @see BasketService::editProduct()
 * @see BasketService::getAttachment()
 * @see BasketService::getBasket()
 * @see BasketService::getCustomTags()
 * @see BasketService::getDeliveries()
 * @see BasketService::getLinkedProducts()
 * @see BasketService::getPaymentSystems()
 * @see BasketService::getPhysicalLocationPickingDeliveries()
 * @see BasketService::getRelatedItems()
 * @see BasketService::getShippingDeliveries()
 * @see BasketService::recalculate()
 * @see BasketService::redeemRewardPoints()
 * @see BasketService::setCustomTags()
 * @see BasketService::setPaymentSystem()
 * @see BasketService::setShippings()
 * @see Basket
 *
 * @see BasketService::addGetAttachment()
 * @see BasketService::addGetBasket()
 * @see BasketService::addGetPaymentSystems()
 * @see BasketService::addGetDeliveries()
 * @see BasketService::addGetPhysicalLocationPickingDeliveries()
 * @see BasketService::addGetShippingDeliveries()
 * @see BasketService::addGetRelatedItems()
 * @see BasketService::addGetCustomTags()
 * @see BasketService::addGetLinkedProducts()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class BasketService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::BASKET_MODEL;

    /**
     * Returns the Attachment
     *
     * @param AttachmentParametersGroup $params
     *      object with the needed data to get de attachment
     * 
     * @return Attachment|NULL
     */
    public function getAttachment(AttachmentParametersGroup $params): ?Attachment {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::OMS_ATTACHMENT)->method(self::GET)->urlParams($params)->build()
            ),
            Attachment::class
        );
    }

    /**
     * Returns the user basket
     *
     * @return Basket|NULL
     */
    public function getBasket(): ?Basket {
        return $this->getResourceElement(Basket::class, Resource::BASKET);
    }

    /**
     * Returns the LockedStocksAggregateData
     *
     * @param LockedStocksAggregateDataParametersGroup $params
     *      object with the needed data to get de LockedStocksAggregateData
     * 
     * @return ElementCollection|NULL
     */
    public function getLockedStocksAggregateData(LockedStocksAggregateDataParametersGroup $params): ?ElementCollection {
        return $this->getElements(LockedStocksAggregateData::class, Resource::OMS_LOCKED_STOCKS_AGGREGATE_DATA, $params);
    }

    /**
     * Recalculate and returns the user basket
     *
     * @return Basket|NULL
     */
    public function recalculate(): ?Basket {
        return $this->prepareElement($this->call(
            (new RequestBuilder())->path(Resource::BASKET_RECALCULATE)->method(self::POST)->build()
        ), Basket::class);
    }

    /**
     * redeem reward points to basket
     *
     * @param RewardPointsRedeemParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function redeemRewardPoints(RewardPointsRedeemParametersGroup $params = null): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_REWARD_POINTS_REDEEM)->method(self::POST)->body($params)->build()
            ),
            Basket::class
        );
    }

    /**
     * Add product to basket
     *
     * @param AddProductParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function addProduct(AddProductParametersGroup $params = null): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_PRODUCT)->method(self::POST)->body($params)->build()
            ),
            Basket::class
        );
    }

    /**
     * Pin the indicated attributes of the product row with the specified value.
     *
     * @param string $hash 
     *          Hash code of a product row of the cart.
     * @param ProductRowPinnedRequestParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function pinProductAttributes(string $hash, ProductRowPinnedRequestParametersGroup $params = null): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_PRODUCT_HASH_PIN)->method(self::PUT)->pathParams(['hash' => $hash])->body($params)->build()
            ),
            Basket::class
        );
    }

    /**
     * Add products to basket
     *
     * @param AddProductsParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return ResponseAddFillProductCollection|NULL
     */
    public function addProducts(AddProductsParametersGroup $params = null): ?ResponseAddFillProductCollection {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_PRODUCTS)->method(self::POST)->body($params)->build()
            ),
            ResponseAddFillProductCollection::class
        );
    }

    /**
     * Set Rows from hash
     * 
     * @param SetRowsParametersGroup $params
     *            object with the needed data to send to the API basket resource
     * 
     * @return ResponseSetRows|NULL
     */
    public function setRows(SetRowsParametersGroup $params = null): ?ResponseSetRows {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_SET_ROWS)->method(self::POST)->body($params)->build()
            ),
            ResponseSetRows::class
        );
    }

    /**
     * Add bundle to basket
     *
     * @param AddBundleParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function addBundle(AddBundleParametersGroup $params = null): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_BUNDLE)->method(self::POST)->body($params)->build()
            ),
            Basket::class
        );
    }


    /**
     * Add linked product to the cart.
     *
     * @param AddLinkedParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function addLinked(AddLinkedParametersGroup $params = null): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_LINKED)->method(self::POST)->body($params)->build()
            ),
            Basket::class
        );
    }

    /**
     * Add gift product to the cart.
     *
     * @param AddGiftParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function addGift(AddGiftParametersGroup $params = null): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_GIFT)->method(self::POST)->body($params)->build()
            ),
            Basket::class
        );
    }

    /**
     * Edit basket product
     *
     * @param EditProductParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function editProduct(string $hash, EditProductParametersGroup $params = null): ?Basket {
        (new HashParametersValidator())->validate(['hash' => $hash]);
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::BASKET_PRODUCT_HASH)->method(self::PUT)->pathParams(['hash' => $hash])->body($params)
                    ->build()
            ),
            Basket::class
        );
    }

    /**
     * Edit basket bundle
     *
     * @param EditBundleParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function editBundle(string $hash, EditBundleParametersGroup $params = null): ?Basket {
        (new HashParametersValidator())->validate(['hash' => $hash]);
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::BASKET_BUNDLE_HASH)->method(self::PUT)->pathParams(['hash' => $hash])->body($params)
                    ->build()
            ),
            Basket::class
        );
    }

    /**
     * Edit linked product to the cart.
     *
     * @param EditLinkedParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function editLinked(string $hash, EditLinkedParametersGroup $params = null): ?Basket {
        (new HashParametersValidator())->validate(['hash' => $hash]);
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::BASKET_LINKED_HASH)->method(self::PUT)->pathParams(['hash' => $hash])->body($params)
                    ->build()
            ),
            Basket::class
        );
    }

    /**
     * Delete basket row
     *
     * @return Basket|NULL
     */
    public function deleteRow(string $hash): ?Basket {
        (new HashParametersValidator())->validate(['hash' => $hash]);
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_ROW_HASH)->method(self::DELETE)->pathParams(['hash' => $hash])->build()
            ),
            Basket::class
        );
    }

    /**
     * Delete basket rows
     *
     * @param DeleteRowsParametersGroup $params
     *            object with the needed data to send to the API basket resource
     * 
     * @return Basket|NULL
     */
    public function deleteRows(DeleteRowsParametersGroup $params = null): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_ROWS_DELETE)->method(self::POST)->body($params)->build()
            ),
            Basket::class
        );
    }

    /**
     * Clear basket
     *
     * @return Basket|NULL
     */
    public function clear(): ?Basket {
        return $this->prepareElement($this->call(
            (new RequestBuilder())->path(Resource::BASKET_CLEAR)->method(self::POST)->build()
        ), Basket::class);
    }

    /**
     * Sets the basket payment system
     *
     * @param EditPaymentSystemParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function setPaymentSystem(EditPaymentSystemParametersGroup $params = null): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_PAYMENT_SYSTEMS)->method(self::POST)->body($params)->build()
            ),
            Basket::class
        );
    }

    /**
     * Returns the basket available payment systems
     *
     * @return ElementCollection|NULL
     */
    public function getPaymentSystems(): ?ElementCollection {
        return $this->getElements(PaymentSystemFactory::class, Resource::BASKET_PAYMENT_SYSTEMS);
    }

    /**
     * Sets the basket shipping methods
     *
     * @param EditShipmentsParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return Basket|NULL
     */
    public function setShippings(EditShipmentsParametersGroup $params = null): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_SHIPPINGS)->method(self::POST)->body($params)->build()
            ),
            Basket::class
        );
    }

    /**
     * Returns the basket available deliveries
     *
     * @param DeliveriesParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return ElementCollection|NULL
     * @deprecated 2404-001
     */
    public function getDeliveries(DeliveriesParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(BasketDeliveryFactory::class, Resource::BASKET_DELIVERIES, $params);
    }

    /**
     * Returns the basket available physical locations picking deliveries
     *
     * @param DeliveriesParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return ElementCollection|NULL
     */
    public function getPhysicalLocationPickingDeliveries(DeliveriesParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(BasketPickingDelivery::class, Resource::BASKET_PHYSICAL_LOCATION_PICKING_DELIVERIES, $params);
    }

    /**
     * Obtains the possible picking ProviderPickupPointPickingDeliveries compatible with the basket at the pickup points provided by the indicated provider according to the location data provided. <br> In addition to the location data described, additional query parameters required for the pickup point provider plugin can be provided according to its specification.
     *
     * @param ProviderPickupPointPickingDeliveriesParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return ElementCollection|NULL
     */
    public function getProviderPickupPointPickingDeliveries(ProviderPickupPointPickingDeliveriesParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(BasketPickingDelivery::class, Resource::BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES, $params);
    }

    /**
     * Obtains the selected picking ProviderPickupPointPickingDeliveries
     *
     * @return ElementCollection|NULL
     */
    public function getProviderPickupPointPickingDeliveriesSelectedPickupPoint(): ?ElementCollection {
        return $this->getElements(BasketPickingDelivery::class, Resource::BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES_SELECTED_PICKUP_POINT);
    }

    /**
     * Returns the basket available shippings
     *
     * @return ElementCollection|NULL
     */
    public function getShippingDeliveries(): ?ElementCollection {
        return $this->getElements(BasketShippingDelivery::class, Resource::BASKET_SHIPPING_DELIVERIES);
    }

    /**
     * Add voucher code to basket
     *
     * @return Basket|NULL
     */
    public function addVoucherCode(string $code): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_VOUCHER_CODE)->method(self::POST)->pathParams(['code' => $code])->build()
            ),
            Basket::class
        );
    }

    /**
     * Delete voucher code from basket
     *
     * @return Basket|NULL
     */
    public function deleteVoucherCode(string $code): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_VOUCHER_CODE)->method(self::DELETE)->pathParams(['code' => $code])->build()
            ),
            Basket::class
        );
    }

    /**
     * Put a comment on the current user's basket
     *
     * @return Basket|NULL
     */
    public function comment(string $comment): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_COMMENT)->method(self::POST)->body(['comment' => $comment])->build()
            ),
            Basket::class
        );
    }

    /**
     * Returns the basket related items
     *
     * @param string $type
     *            Optional. This param will set the kind of related we want to retrieve. Valid values are inside RelatedItemsType class.
     *            If not given all the related items will be returned inside the RelatedItems object.
     * @param RelatedItemsParametersGroup $params
     *
     * @return ElementCollection|NULL
     */
    public function getRelatedItems(string $type = '', RelatedItemsParametersGroup $params = null): ?ElementCollection {
        return $this->getResponse(
            ['items' => $this->getConnection()->doRequest(
                (new RequestBuilder())
                    ->path($this->getRelatedItemsResource($type))->pathParams(['type' => strtolower($type)])->urlParams($params)
                    ->build()
            )],
            RelatedItems::class
        );
    }

    /**
     * Returns the custom tags filtered with the given parameters for the current basket
     *
     * @param BasketCustomTagsParametersGroup $params
     *            object with the needed filters to send to the API basket resource
     *
     * @return ElementCollection|NULL
     */
    public function getCustomTags(CustomTagsParametersGroup $params = new BasketCustomTagsParametersGroup()): ?ElementCollection {
        return $this->getElements(CustomTag::class, Resource::CUSTOM_TAGS, $params);
    }

    /**
     * Sets the basket custom tags
     *
     * @return Basket|NULL
     */
    public function setCustomTags(EditBasketCustomTagsParametersGroup $params = null): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BASKET_CUSTOM_TAGS)->method(self::POST)->body($params)->build()
            ),
            Basket::class
        );
    }

    /**
     * Returns the product linked to the cart
     *
     * @param LinkedParametersGroup $params
     *            object with the needed filters to send to the API /products/{id}/linked resource
     *
     * @return ElementCollection|NULL
     */
    public function getLinkedProducts(LinkedParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(
            Linked::class,
            Resource::BASKET_LINKED,
            $params
        );
    }

    /**
     * Sets the basket addresses
     *
     * @return Basket|NULL
     * @deprecated use BasketService::updateOmsBasketCustomer
     */
    public function setAddressesBook(SetBasketAddressesBookParametersGroup $params = null): ?Basket {
        if (!Application::getInstance()->getEcommerceSettings()->getAccountRegisteredUsersSettings()->getCardinalityPlus()) {
            return $this->prepareElement(
                $this->call(
                    (new RequestBuilder())->path(Resource::BASKET_ADDRESSES)->method(self::POST)->body($params)->build()
                ),
                Basket::class
            );
        } else {
            $updateOmsBasketCustomerParametersGroup = UserToAccountFactory::mapSetAddressesBookToUpdateOmsBasketCustomer($params);
            return $this->updateOmsBasketCustomer($updateOmsBasketCustomerParametersGroup);
        }
    }

    /**
     * Add the request to get a Attachment
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param AttachmentParametersGroup $params
     *      object with the needed data to get de attachment
     * 
     * @return void
     */
    public function addGetAttachment(BatchRequests $batchRequests, string $batchName, AttachmentParametersGroup $params): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_ATTACHMENT)->urlParams($params)->build());
    }

    /**
     * Add the request to get the user basket
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetBasket(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::BASKET)->build());
    }

    /**
     * Add the request to get the basket available payment systems
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetPaymentSystems(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::BASKET_PAYMENT_SYSTEMS)->build());
    }

    /**
     * Add the request to get the basket available deliveries
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param DeliveriesParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return void
     * @deprecated 2404-001
     */
    public function addGetDeliveries(BatchRequests $batchRequests, string $batchName, DeliveriesParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BASKET_DELIVERIES)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the basket available physical locations picking deliveries
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param DeliveriesParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return void
     */
    public function addGetPhysicalLocationPickingDeliveries(BatchRequests $batchRequests, string $batchName, DeliveriesParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BASKET_PHYSICAL_LOCATION_PICKING_DELIVERIES)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the basket available Provider PickupPoint Picking Deliveries
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param ProviderPickupPointPickingDeliveriesParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return void
     */
    public function addGetProviderPickupPointPickingDeliveries(BatchRequests $batchRequests, string $batchName, ProviderPickupPointPickingDeliveriesParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the basket selected Provider PickupPoint Picking Deliveries
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetProviderPickupPointPickingDeliveriesSelectedPickupPoint(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES_SELECTED_PICKUP_POINT)->build()
        );
    }

    /**
     * Add the request to get the basket available shippings
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetShippingDeliveries(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::BASKET_SHIPPING_DELIVERIES)->build());
    }

    /**
     * Add the request to get the basket related items
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $type
     *            Optional. This param will set the kind of related we want to retrieve. Valid values are inside RelatedItemsType class.
     *            If not given all the related items will be returned inside the RelatedItems object.
     * @param RelatedItemsParametersGroup $params
     *
     * @return void
     */
    public function addGetRelatedItems(BatchRequests $batchRequests, string $batchName, string $type = '', RelatedItemsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)
                ->path($this->getRelatedItemsResource($type))
                ->pathParams(['type' => strtolower($type)])
                ->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get products linked to the cart
     *
     * @param LinkedParametersGroup $params
     *            object with the needed filters to send to the API /products/{id}/linked resource
     *
     * @return ElementCollection|NULL
     */
    public function addGetLinkedProducts(BatchRequests $batchRequests, string $batchName, LinkedParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::BASKET_LINKED)->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get locked stocks aggregateData
     *
     * @param LockedStocksAggregateDataParametersGroup $params
     *            object with the needed filters to send to the API oms/lockedStocks/aggregateData resource
     *
     * @return ElementCollection|NULL
     */
    public function addGetLockedStocksAggregateData(BatchRequests $batchRequests, string $batchName, LockedStocksAggregateDataParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::OMS_LOCKED_STOCKS_AGGREGATE_DATA)->urlParams($params)
                ->build()
        );
    }

    private function getRelatedItemsResource(string $type): string {
        $resource = Resource::BASKET_RELATED;

        if (strlen(trim($type)) !== 0) {
            if (!RelatedItemsType::isValid($type)) {
                throw new InvalidParameterException(
                    'Invalid value "' . $type . '" for parameter "type"',
                    InvalidParameterException::INVALID_PARAMETER_VALUE
                );
            }
            $resource = Resource::BASKET_RELATED_TYPE;
        }

        return $resource;
    }

    /**
     * Add the request to get the basket available custom tags and their values
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param BasketCustomTagsParametersGroup $params
     *            object with the needed filters to send to the API basket resource
     *
     * @return void
     */
    public function addGetCustomTags(
        BatchRequests $batchRequests,
        string $batchName,
        CustomTagsParametersGroup $params = new BasketCustomTagsParametersGroup()
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::CUSTOM_TAGS)->urlParams($params)
                ->build()
        );
    }

    /**
     * This method is responsible for return the express checkout url.
     * 
     * @param PluginAccountIdParametersGroup $params
     *            object with the needed filters to send to the API express checkout url resource.
     *
     * @return array
     */
    public function getExpressCheckoutUrl(PluginAccountIdParametersGroup $params = null): UrlResponse {
        return $this->prepareElement($this->call(
            (new RequestBuilder())
                ->path(Resource::EXPRESS_CHECKOUT)
                ->method(self::GET)
                ->urlParams($params)
                ->build()
        ), UrlResponse::class);
    }

    /**
     * Add the request to get the url of the express checkout to the batch.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param PluginAccountIdParametersGroup $params
     *            object with the needed filters to send to the API express checkout url resource.
     *
     * @return ElementCollection|NULL
     */
    public function addGetExpressCheckoutUrl(BatchRequests $batchRequests, string $batchName, PluginAccountIdParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)
                ->path(Resource::EXPRESS_CHECKOUT)
                ->urlParams($params)
                ->build()
        );
    }

    /**
     * This method is responsible for validate the express checkout.
     * 
     * @param ExpressCheckoutValidateParametersGroup $params
     * 
     * @return Basket
     */
    public function validateExpressCheckout(ExpressCheckoutValidateParametersGroup $params = null): Basket {
        if (is_null($params)) {
            $params = $this->getExpressCheckoutValidateParametersGroup();
        }
        return $this->prepareElement($this->call(
            (new RequestBuilder())
                ->path(Resource::EXPRESS_CHECKOUT_VALIDATE)
                ->method(self::POST)
                ->body($params)
                ->build()
        ), Basket::class);
    }

    private function getExpressCheckoutValidateParametersGroup(): ExpressCheckoutValidateParametersGroup {
        $expressCheckoutValidateParametersGroup = new ExpressCheckoutValidateParametersGroup();
        $expressCheckoutValidateParametersGroup->setParams($_GET + $_POST);
        $jsonBody = file_get_contents('php://input');
        $body = json_decode($jsonBody, true);
        if (!is_null($body)) {
            $expressCheckoutValidateParametersGroup->setBody($jsonBody);
            $expressCheckoutValidateParametersGroup->setParams($_GET + $_POST + $body);
        }
        return $expressCheckoutValidateParametersGroup;
    }

    /**
     * This method is responsible for logout the express checkout.
     * 
     * @return Basket
     */
    public function logoutExpressCheckout(): Basket {
        return $this->prepareElement($this->call(
            (new RequestBuilder())
                ->path(Resource::EXPRESS_CHECKOUT_LOGOUT)
                ->method(self::POST)
                ->build()
        ), Basket::class);
    }

    /**
     * Update locked stock timer
     *
     * @param UpdateLockedStockTimerParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return BasketLockedStockTimers|NULL
     */
    public function updateLockedStockTimer(string $uId, UpdateLockedStockTimerParametersGroup $params): ?BasketLockedStockTimers {
        (new UIdParametersValidator())->validate(['uId' => $uId]);
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::BASKET_LOCKED_STOCK_TIMERS_U_ID)->method(self::PUT)->pathParams(['uId' => $uId])->body($params)
                    ->build()
            ),
            BasketLockedStockTimers::class
        );
    }

    /**
     * Update oms basket customer
     *
     * @param UpdateOmsBasketCustomerParametersGroup $data
     *            object with the needed filters to send to the API accounts resource
     * @return Basket|NULL
     */
    public function updateOmsBasketCustomer(UpdateOmsBasketCustomerParametersGroup $data, string $dataValidator = ''): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::BASKET_CUSTOMER)->method(self::PUT)
                ->headers(strlen($dataValidator) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidator] : [])
                ->body($data)->build()),
            Basket::class
        );
    }
}
