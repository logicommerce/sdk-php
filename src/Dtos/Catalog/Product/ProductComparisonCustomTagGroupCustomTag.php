<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Product Comparison CustomTag Group CustomTag class.
 * Information for each comparable custom tag without group associated to some product of the product comparison.
 *
 * @see ProductComparisonCustomTagGroupCustomTag::getPriority()
 * @see ProductComparisonCustomTagGroupCustomTag::getProductIds()
 *
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ProductComparisonCustomTagGroupCustomTag {
    use ElementTrait, IdentifiableElementTrait;

    protected int $priority = 0;

    protected array $productIds = [];

    /**
     * Returns the product priority
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the productIds
     *
     * @return array
     */
    public function getProductIds(): array {
        return $this->productIds;
    }

}
