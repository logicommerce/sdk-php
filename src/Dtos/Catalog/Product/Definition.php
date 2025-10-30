<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\DateAddedTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\BackorderMode;

/**
 * This is the product Definition class.
 * The definitions information of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Definition::getStartOfferDate()
 * @see Definition::getOffer()
 * @see Definition::getMultipleOrderQuantity()
 * @see Definition::getFeatured()
 * @see Definition::getAvailableDate()
 * @see Definition::getAvailabilityId()
 * @see Definition::getShowOrderBox()
 * @see Definition::getMinOrderQuantity()
 * @see Definition::getMaxOrderQuantity()
 * @see Definition::getDefinitionId()
 * @see Definition::getPercentPriceOverrideCustomPrices()
 * @see Definition::getShowDiscounts()
 * @see Definition::getBackorder()
 * @see Definition::getPercentPrice()
 * @see Definition::getPriority()
 * @see Definition::getStockManagement()
 * @see Definition::getGroupQuantityByOptions()
 * @see Definition::getUseRetailPrice()
 * @see Definition::getShowBasePrice()
 * @see Definition::getEndFeaturedDate()
 * @see Definition::getEndOfferDate()
 * @see Definition::getMultipleActsOver()
 * @see Definition::getOnRequest()
 * @see Definition::getOnRequestDays()
 * @see Definition::getActive()
 * @see Definition::getShowPrice()
 * @see Definition::getReturnable()
 * @see Definition::getExclusiveLinked()
 * @see Definition::getAvailability()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see DateAddedTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class Definition {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait, DateAddedTrait;

    protected ?Date $startOfferDate = null;

    protected bool $offer = false;

    protected int $multipleOrderQuantity = 0;

    protected bool $featured = false;

    protected ?Date $availableDate = null;

    protected int $availabilityId = 0;

    protected bool $showOrderBox = false;

    protected int $minOrderQuantity = 0;

    protected int $maxOrderQuantity = 0;

    protected int $definitionId = 0;

    protected bool $percentPriceOverrideCustomPrices = false;

    protected bool $showDiscounts = false;

    protected string $backorder = '';

    protected float $percentPrice = 0.0;

    protected int $priority = 0;

    protected bool $stockManagement = false;

    protected bool $groupQuantityByOptions = false;

    protected bool $useRetailPrice = false;

    protected bool $showBasePrice = false;

    protected ?Date $endFeaturedDate = null;

    protected ?Date $endOfferDate = null;

    protected int $multipleActsOver = 0;

    protected bool $onRequest = false;

    protected int $onRequestDays = 0;

    protected bool $active = false;

    protected bool $showPrice = false;

    protected bool $returnable = false;

    protected bool $exclusiveLinked = false;

    protected ?ProductAvailability $availability = null;

    protected ?Date $publicationDate = null;

    /**
     * Returns the date when the offer starts/was started.
     *
     * @return Date|NULL
     */
    public function getStartOfferDate(): ?Date {
        return $this->startOfferDate;
    }

    protected function setStartOfferDate(string $startOfferDate): void {
        $this->startOfferDate = Date::create($startOfferDate);
    }

    /**
     * Sets if the product has to be setted as a offer or not.
     *
     * @return bool
     */
    public function getOffer(): bool {
        return $this->offer;
    }

    /**
     * Returns the product multiple order quantity.
     *
     * @return int
     */
    public function getMultipleOrderQuantity(): int {
        return $this->multipleOrderQuantity;
    }

    /**
     * Sets if the product has to be setted as a featured or not.
     *
     * @return bool
     */
    public function getFeatured(): bool {
        return $this->featured;
    }

    /**
     * Returns the date when the product was available for the first time.
     *
     * @return Date|NULL
     */
    public function getAvailableDate(): ?Date {
        return $this->availableDate;
    }

    protected function setAvailableDate(string $availableDate): void {
        $this->availableDate = Date::create($availableDate);
    }

    /**
     * Returns the internal identifier of the product assigned availability.
     *
     * @return int
     */
    public function getAvailabilityId(): int {
        return $this->availabilityId;
    }

    /**
     * Sets if the product order box has to be visible or not.
     *
     * @return bool
     */
    public function getShowOrderBox(): bool {
        return $this->showOrderBox && $this->showPrice;
    }

    /**
     * Returns the minimum quantity needed on basket of this product to purchase it.
     *
     * @return int
     */
    public function getMinOrderQuantity(): int {
        return $this->minOrderQuantity;
    }

    /**
     * Returns the maximum quantity available on basket of this product to purchase it.
     *
     * @return int
     */
    public function getMaxOrderQuantity(): int {
        return $this->maxOrderQuantity;
    }

    /**
     * Returns the identifier of the product definition.
     *
     * @return int
     */
    public function getDefinitionId(): int {
        return $this->definitionId;
    }

    /**
     * Sets if the product percent price has to override the custom prices or not.
     *
     * @return bool
     */
    public function getPercentPriceOverrideCustomPrices(): bool {
        return $this->percentPriceOverrideCustomPrices;
    }

    /**
     * Sets if the product has to show the available discounts or not.
     *
     * @return bool
     */
    public function getShowDiscounts(): bool {
        return $this->showDiscounts;
    }

    /**
     * Sets if the product allow the reservation and how (reservation type).
     *
     * @return string
     */
    public function getBackorder(): string { // ENUM
        return $this->getEnum(BackorderMode::class, $this->backorder, BackorderMode::NONE);
    }

    /**
     * Returns the product percent price.
     *
     * @return float
     */
    public function getPercentPrice(): float {
        return $this->percentPrice;
    }

    /**
     * Returns the product definition priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Sets if the product stock management is active or not.
     *
     * @return bool
     */
    public function getStockManagement(): bool {
        return $this->stockManagement;
    }

    /**
     * Sets if the product will group quantities by options or not.
     *
     * @return bool
     */
    public function getGroupQuantityByOptions(): bool {
        return $this->groupQuantityByOptions;
    }

    /**
     * Sets if the product will use the retail price or not.
     *
     * @return bool
     */
    public function getUseRetailPrice(): bool {
        return $this->useRetailPrice;
    }

    /**
     * Sets if the product will show the base price or not.
     *
     * @return bool
     */
    public function getShowBasePrice(): bool {
        return $this->showBasePrice;
    }

    /**
     * Returns the date when the featured will end.
     *
     * @return Date|NULL
     */
    public function getEndFeaturedDate(): ?Date {
        return $this->endFeaturedDate;
    }

    protected function setEndFeaturedDate(string $endFeaturedDate): void {
        $this->endFeaturedDate = Date::create($endFeaturedDate);
    }

    /**
     * Returns the date when the offer will end.
     *
     * @return Date|NULL
     */
    public function getEndOfferDate(): ?Date {
        return $this->endOfferDate;
    }

    protected function setEndOfferDate(string $endOfferDate): void {
        $this->endOfferDate = Date::create($endOfferDate);
    }

    /**
     * Returns over which number the multiple will start acting.
     *
     * @return string
     */
    public function getMultipleActsOver(): int {
        return $this->multipleActsOver;
    }

    /**
     * Sets if it's a on request product.
     *
     * @return bool
     */
    public function getOnRequest(): bool {
        return $this->onRequest;
    }

    /**
     * Returns the number of days a request takes to be fulfilled.
     *
     * @return int
     */
    public function getOnRequestDays(): int {
        return $this->onRequestDays;
    }

    /**
     * Sets if the product is active or not.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Sets if the product price has to be displayed or not.
     *
     * @return bool
     */
    public function getShowPrice(): bool {
        return $this->showPrice;
    }

    /**
     * Sets if it's a returnable product.
     *
     * @return bool
     */
    public function getReturnable(): bool {
        return $this->returnable;
    }

    /**
     * Sets if it's a exclusive linked product.
     *
     * @return bool
     */
    public function getExclusiveLinked(): bool {
        return $this->exclusiveLinked;
    }

    /**
     * Returns the product availability object.
     *
     * @see ProductAvailability
     * @return ProductAvailability|NULL
     */
    public function getAvailability(): ?ProductAvailability {
        return $this->availability;
    }

    protected function setAvailability(array $availability): void {
        $this->availability = new ProductAvailability($availability);
    }

    /**
     * Returns the date when the featured will publicate.
     *
     * @return Date|NULL
     */
    public function getPublicationDate(): ?Date {
        return $this->publicationDate;
    }

    protected function setPublicationDate(string $publicationDate): void {
        $this->publicationDate = Date::create($publicationDate);
    }
}
