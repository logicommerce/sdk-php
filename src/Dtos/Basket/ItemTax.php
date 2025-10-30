<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the basket item tax group class.
 * The basket item taxes information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ItemTax::getDiscountCodes()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class ItemTax {
    use ElementTrait;

    protected int $taxId = 0;

    /**
     * Returns the tax internal identifier.
     *
     * @return int
     */
    public function getTaxId(): int {
        return $this->taxId;
    }
}
