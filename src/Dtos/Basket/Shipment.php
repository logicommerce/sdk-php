<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Factories\AppliedDiscountFactory;

/**
 * This is the shipment class.
 * The shipments information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Shipment::getShippings()
 * @see Shipment::getAppliedDiscounts()
 * @see Shipment::getOffsetDays()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class Shipment extends BaseShipment {
    use ElementTrait;

    protected array $shippings = [];

    protected array $appliedDiscounts = [];

    protected int $offsetDays = 0;

    /**
     * Returns the shipment shippings.
     *
     * @return Shipping[]
     */
    public function getShippings(): array {
        return $this->shippings;
    }

    protected function setShippings(array $shippings): void {
        $this->shippings = $this->setArrayField($shippings, Shipping::class);
    }

    /**
     * Returns the shipment applied discounts.
     *
     * @return AppliedDiscount[]
     */
    public function getAppliedDiscounts(): array {
        return $this->appliedDiscounts;
    }

    protected function setAppliedDiscounts(array $appliedDiscounts): void {
        $this->appliedDiscounts = $this->setArrayField($appliedDiscounts, AppliedDiscountFactory::class);
    }

    /**
     * Returns the shipment offset days.
     *
     * @return int
     */
    public function getOffsetDays(): int {
        return $this->offsetDays;
    }
}
