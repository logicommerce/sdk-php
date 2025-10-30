<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\BasketWarnings\BasketWarning;

/**
 * This is the delivery row container class.
 * The delivery rows information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DeliveryRow::getBasketRowData()
 * @see DeliveryRow::getBasketWarnings()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class DeliveryRow {
    use ElementTrait;

    protected ?BasketRowData $basketRowData = null;

    protected array $basketWarnings = [];

    /**
     * Returns the delivery row basketRowData.
     *
     * @return BasketRowData|NULL
     */
    public function getBasketRowData(): ?BasketRowData {
        return $this->basketRowData;
    }

    protected function setBasketRowData(array $basketRowData): void {
        $this->basketRowData = new BasketRowData($basketRowData);
    }

    /**
     * Returns the delivery row basketWarnings.
     *
     * @return BasketWarning[]
     */
    public function getBasketWarnings(): array {
        return $this->basketWarnings;
    }

    protected function setBasketWarnings(array $basketWarnings): void {
        $this->basketWarnings = $this->setArrayField($basketWarnings, BasketWarning::class);
    }
}
