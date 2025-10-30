<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the basket base prices class.
 * The base prices information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Price::getUnitPrice()
 * @see Price::getUnitPreviousPrice()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class Price {
    use ElementTrait;

    protected float $unitPrice = 0.0;

    protected float $unitPreviousPrice = 0.0;

    /**
     * Returns unit price.
     *
     * @return float
     */
    public function getUnitPrice(): float {
        return $this->unitPrice;
    }

    /**
     * Returns the unit previous price.
     *
     * @return float
     */
    public function getUnitPreviousPrice(): float {
        return $this->unitPreviousPrice;
    }
}
