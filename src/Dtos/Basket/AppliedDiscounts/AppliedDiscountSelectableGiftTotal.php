<?php

namespace SDK\Dtos\Basket\AppliedDiscounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CalculationMode;


/**
 * This is the general basket applied discount selectable gift class.
 *
 * @see AppliedDiscountSelectableGiftTotal::getDiscountId()
 * @see AppliedDiscountSelectableGiftTotal::getCalculationMode()
 * @see AppliedDiscountSelectableGiftTotal::getMaxGiftUnitsRemaining()
 * @see AppliedDiscountSelectableGiftTotal::getBasketGiftIdList()
 *
 * @see AppliedDiscount
 * 
 * @uses ElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Basket\AppliedDiscounts
 */
class AppliedDiscountSelectableGiftTotal extends AppliedDiscountSelectableGift {
    use ElementTrait, EnumResolverTrait;

    protected string $calculationMode = '';

    /**
     * Returns the applied discount calculation mode.
     *
     * @return string
     */
    public function getCalculationMode(): string { // ENUM
        return $this->getEnum(CalculationMode::class, $this->calculationMode, CalculationMode::FIXED_UNITS);
    }
}
