<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the discount value trait.
 *
 * @see ElementDiscountValueTrait::getDiscountValue()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ElementDiscountValueTrait {

    protected float $discountValue = 0.0;

    /**
     * Returns the applied discount value for the amount type.
     *
     * @return float
     */
    public function getDiscountValue(): float {
        return $this->discountValue;
    }

}
