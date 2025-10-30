<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the basket product prices class.
 * The basket products prices information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketRowPrices::getPrice()
 * @see BasketRowPrices::getPreviousPrice()
 * @see BasketRowPrices::getTotalDiscounts()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class BasketRowPrices extends Price {
    use ElementTrait;

    protected float $price = 0.0;

    protected float $previousPrice = 0.0;

    protected float $totalDiscounts = 0.0;

    /**
     * Returns the base price.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Returns the previous price.
     *
     * @return float
     */
    public function getPreviousPrice(): float {
        return $this->previousPrice;
    }

    /**
     * Returns the total discounts.
     *
     * @return float
     */
    public function getTotalDiscounts(): float {
        return $this->totalDiscounts;
    }
}
