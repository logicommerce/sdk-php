<?php

namespace SDK\Dtos\Basket\AppliedDiscounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Basket\AppliedDiscount;
use SDK\Enums\AmountType;

/**
 * This is the general basket applied discount amount class.
 *
 * @see AppliedDiscountAmountTotal::getAmountType()
 *
 * @see AppliedDiscount
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Basket\AppliedDiscounts
 */
class AppliedDiscountAmountTotal extends AppliedDiscount {
    use ElementTrait, EnumResolverTrait;

    protected string $amountType = '';

    /**
     * Returns the applied discount amount type.
     *
     * @return string
     */
    public function getAmountType(): string { // ENUM
        return $this->getEnum(AmountType::class, $this->amountType, AmountType::ABSOLUTE);
    }

}
