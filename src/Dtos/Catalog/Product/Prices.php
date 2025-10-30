<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Prices class.
 * The prices of API items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Prices::getBasePrice()
 * @see Prices::getRetailPrice()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class Prices {
    use ElementTrait;

    protected float $basePrice = 0.0;

    protected float $retailPrice = 0.0;

    /**
     * Returns the item base price.
     *
     * @return float
     */
    public function getBasePrice(): float {
        return $this->basePrice;
    }

    /**
     * Returns the item retail price.
     *
     * @return float
     */
    public function getRetailPrice(): float {
        return $this->retailPrice;
    }
}
