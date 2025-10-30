<?php

namespace SDK\Dtos\Basket\AppliedDiscounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\AppliedDiscount;

/**
 * This is the applied discount MxN class.
 *
 * @see AppliedDiscountMxN::getQuantity()
 *
 * @see AppliedDiscount
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\AppliedDiscounts
 */
class AppliedDiscountMxN extends AppliedDiscount {
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
