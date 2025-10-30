<?php

namespace SDK\Dtos\Basket\AppliedDiscounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementValueWithTaxesTrait;

/**
 * This is the applied discount amount class.
 * 
 * @see AppliedDiscountAmount
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\AppliedDiscounts
 */
class AppliedDiscountAmountCombination extends AppliedDiscountAmount {
    use ElementTrait;

    protected int $quantity = 0;

    /**
     * Returns the applied discount quantity.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }
}
