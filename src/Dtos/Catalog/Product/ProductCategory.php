<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Product Category class.
 * The product category of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductCategory::getPriority()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ProductCategory {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait;

    protected int $priority = 0;

    /**
     * Returns product category priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }
}
