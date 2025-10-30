<?php

namespace SDK\Dtos\Catalog\Product;


use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Catalog\Discount;

/**
 * This is the products discounts class.
 * The products discounts of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductsDiscounts::getApplicableProductIds()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ProductsDiscounts extends Discount {
    use ElementTrait;

    protected array $applicableProductIds = [];

    /**
     * Returns a collection of applicableProductIds for this products discounts object.
     *
     * @return array
     */
    public function getApplicableProductIds(): array {
        return $this->applicableProductIds;
    }

    protected function setApplicableProductIds(array $applicableProductIds): void {
        $this->applicableProductIds = $applicableProductIds;
    }
}
