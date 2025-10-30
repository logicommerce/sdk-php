<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Prices by Quantity class.
 * The prices by quantity of API items prices will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PricesByQuantity::getPricesByQuantity()
 * @see PricesByQuantity::getBasePrice()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class PricesByQuantity {
    use ElementTrait;

    protected ?Prices $prices = null;

    protected int $quantity = 0;

    /**
     * Returns the prices by quantity prices object.
     *
     * @see Prices
     * @return Prices|NULL
     */
    public function getPrices(): ?Prices {
        return $this->prices;
    }

    protected function setPrices(array $prices): void {
        $this->prices = new Prices($prices);
    }

    /**
     * Returns the total quantity that set that this price available for the current item.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }
}
