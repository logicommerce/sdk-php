<?php

namespace SDK\Dtos\Basket\BasketRows\Bundle;

use SDK\Dtos\Basket\BasketRows\Product;

/**
 * This is the basket BundleItem class.
 * The basket BundleItems information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BundleItem::getBundleItemId()
 * 
 * @see Product
 *
 * @package SDK\Dtos\Basket\BasketRows
 */
class BundleItem extends Product {

    protected int $bundleItemId = 0;

    /**
     * Returns the bundle item bundleItemId.
     *
     * @return int
     */
    public function getBundleItemId(): int {
        return $this->bundleItemId;
    }

}
