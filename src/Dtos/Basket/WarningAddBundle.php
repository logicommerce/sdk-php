<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Warning Add Bundle class.
 * The shipment rows information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Shipment::getQuantity()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class WarningAddBundle {
    use ElementTrait, IdentifiableElementTrait;

    protected int $quantity = 0;

    /**
     * Returns the shipment row quantity.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }
}
