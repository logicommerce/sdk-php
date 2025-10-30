<?php

namespace SDK\Dtos\Basket\AppliedDiscounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\AppliedDiscount;

/**
 * This is the general basket applied discount gift class.
 *
 * @see AppliedDiscountGiftTotal::getItems()
 *
 * @see AppliedDiscount
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\AppliedDiscounts
 */
class AppliedDiscountGiftTotal extends AppliedDiscount {
    use ElementTrait;
}
