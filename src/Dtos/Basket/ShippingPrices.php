<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the shipping prices class.
 * The shipping prices information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ShippingPrices::getPrice()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class ShippingPrices {
    use ElementTrait;

    protected float $price = 0.0;

    /**
     * Returns the shipping prices price.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }
}
