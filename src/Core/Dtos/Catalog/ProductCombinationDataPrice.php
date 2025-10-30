<?php

namespace SDK\Core\Dtos\Catalog;

use SDK\Dtos\Catalog\Product\ItemPrices;

/**
 * This is the Product Combination Data Price lass.
 * The API ProductCombinationDataPrice data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductCombinationDataPrice::getBasePrice()
 * @see ProductCombinationDataPrice::getRetailPrice()
 *
 * @see Element
 * 
 * @package SDK\Core\Dtos
 */
class ProductCombinationDataPrice extends ItemPrices {

    // @deprecated
    protected float $basePrice = 0.0;

    // @deprecated
    protected float $retailPrice = 0.0;

    /**
     * Returns the item base price.
     *
     * @return float
     * @deprecated
     */
    public function getBasePrice(): float {
        return $this->basePrice;
    }

    /**
     * Returns the item retail price.
     *
     * @return float
     * @deprecated
     */
    public function getRetailPrice(): float {
        return $this->retailPrice;
    }
}
