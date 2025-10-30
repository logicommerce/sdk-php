<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the shipment row class.
 * The shipment rows information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Shipment::getBasketRowData()
 * @see Shipment::getQuantity()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class ShipmentRow {
    use ElementTrait;

    protected ?BasketRowData $basketRowData = null;

    protected int $quantity = 0;

    /**
     * Returns the shipment row basketRowData.
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
     * Returns the shipment row quantity.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }
}
