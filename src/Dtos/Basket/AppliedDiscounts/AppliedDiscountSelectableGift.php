<?php

namespace SDK\Dtos\Basket\AppliedDiscounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\AppliedDiscount;

/**
 * This is the applied discount selectable gift class.
 *
 * @see AppliedDiscountSelectableGiftTotal
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\AppliedDiscounts
 */
class AppliedDiscountSelectableGift extends AppliedDiscount {
    use ElementTrait;

    protected int $discountId = 0;

    protected int $maxGiftUnitsRemaining = 0;

    protected array $basketGiftIdList = [];

    /**
     * Returns the applied discountId
     *
     * @return int
     */
    public function getDiscountId(): int {
        return $this->discountId;
    }

    /**
     * Returns the max gift units remaining
     *
     * @return int
     */
    public function getMaxGiftUnitsRemaining(): int {
        return $this->maxGiftUnitsRemaining;
    }

    /**
     * Returns the applied discount selectable gifts.
     *
     * @return array
     */
    public function getBasketGiftIdList(): array {
        return $this->basketGiftIdList;
    }

    protected function setBasketGiftIdList(array $basketGiftIdList): void {
        $this->basketGiftIdList = $basketGiftIdList;
    }
}
