<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Combination Value class.
 * The values information of API product combinations will be stored in that class and will remain immutable
 * (only get methods are available)
 *
 * @see CombinationValue::getProductOptionValueId()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class CombinationValue {
    use ElementTrait;

    protected int $productOptionValueId = 0;

    /**
     * Returns the combination value id.
     *
     * @return int
     */
    public function getProductOptionValueId(): int {
        return $this->productOptionValueId;
    }
}
