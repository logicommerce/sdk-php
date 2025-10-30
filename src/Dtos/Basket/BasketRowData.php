<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\ShippingCalculation;
use SDK\Enums\BackorderMode;

/**
 * This is the basket row data container class.
 * The basket row data information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketRowData::getProductId()
 * @see BasketRowData::getHash()
 * @see BasketRowData::getQuantity()
 * @see BasketRowData::getTotalWeight()
 * @see BasketRowData::getTotalPrice()
 * @see BasketRowData::getStockManagement()
 * @see BasketRowData::getOnRequest()
 * @see BasketRowData::getShipping()
 * @see BasketRowData::getShippingCalculation()
 * @see BasketRowData::getBackorder()
 * @see BasketRowData::getOnRequestDays()
 * @see BasketRowData::getMainCategory()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class BasketRowData {
    use ElementTrait, EnumResolverTrait;

    protected int $productId = 0;

    protected string $hash = '';

    protected int $quantity = 0;

    protected float $totalWeight = 0.0;

    protected float $totalPrice = 0.0;

    protected bool $stockManagement = false;

    protected bool $onRequest = false;

    protected bool $shipping = false;

    protected string $shippingCalculation = '';

    protected string $backorder = '';

    protected int $onRequestDays = 0;

    protected int $mainCategory = 0;

    /**
     * Returns the basket row product internal id.
     *
     * @return int
     */
    public function getProductId(): int {
        return $this->productId;
    }

    /**
     * Returns the basket row hash.
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }

    /**
     * Returns the basket row quantity.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns the basket row total weight.
     *
     * @return float
     */
    public function getTotalWeight(): float {
        return $this->totalWeight;
    }

    /**
     * Returns the basket row total price.
     *
     * @return float
     */
    public function getTotalPrice(): float {
        return $this->totalPrice;
    }

    /**
     * Returns the basket row stock management.
     *
     * @return bool
     */
    public function getStockManagement(): bool {
        return $this->stockManagement;
    }

    /**
     * Returns the basket row on request.
     *
     * @return bool
     */
    public function getOnRequest(): bool {
        return $this->onRequest;
    }

    /**
     * Returns the basket row shipping.
     *
     * @return bool
     */
    public function getShipping(): bool {
        return $this->shipping;
    }

    /**
     * Returns the basket row shipping calculation.
     *
     * @return string
     */
    public function getShippingCalculation(): string { // ENUM
        return $this->getEnum(ShippingCalculation::class, $this->shippingCalculation, ShippingCalculation::BY_WEIGHT);
    }

    /**
     * Sets if the basket row allow the reservation and how (reservation type).
     *
     * @return string
     */
    public function getBackorder(): string { // ENUM
        return $this->getEnum(BackorderMode::class, $this->backorder, BackorderMode::NONE);
    }

    /**
     * Returns the basket row on request days.
     *
     * @return int
     */
    public function getOnRequestDays(): int {
        return $this->onRequestDays;
    }

    /**
     * Returns the basket row main category.
     *
     * @return int
     */
    public function getMainCategory(): int {
        return $this->mainCategory;
    }
}
