<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Item Prices class.
 * The prices of API items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ItemPrices::getPricesByQuantity()
 * @see ItemPrices::getBasePrice()
 * @see ItemPrices::getRetailPrice()
 * @see ItemPrices::getPrices()
 * @see ItemPrices::getPriceByQuantity()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ItemPrices {
    use ElementTrait;

    protected ?Prices $prices = null;

    protected array $pricesByQuantity = [];

    /**
     * Returns the collection of prices by quantity for this item.
     *
     * @see PricesByQuantity
     * @return PricesByQuantity[]
     */
    public function getPricesByQuantity(): array {
        return $this->pricesByQuantity;
    }

    protected function setPricesByQuantity(array $pricesByQuantity): void {
        $this->pricesByQuantity = $this->setArrayField($pricesByQuantity, PricesByQuantity::class);
    }

    /**
     * Returns the item base price.
     *
     * @return float
     */
    public function getBasePrice(): float {
        return $this->prices->getBasePrice();
    }

    /**
     * Returns the item retail price.
     *
     * @return float
     */
    public function getRetailPrice(): float {
        return $this->prices->getRetailPrice();
    }

    /**
     * Returns the item prices object.
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
     * Returns the item prices object for the given quantity.
     *
     * @param int $quantity
     *            The quantity for which we want the prices.
     *
     * @see Prices
     * @return Prices
     */
    public function getPriceByQuantity(int $quantity = -1): Prices {
        if ($quantity < 0) {
            $quantity = 1;
        }
        if ($quantity > 1 && !empty($this->getPricesByQuantity())) {
            $priceByQuantity = array_filter($this->getPricesByQuantity(), fn (PricesByQuantity $p) => $p->getQuantity() <= $quantity);
            usort(
                $priceByQuantity,
                fn (PricesByQuantity $p1, PricesByQuantity $p2) => ($p1->getQuantity() == $p2->getQuantity()) ? 0 : (($p1->getQuantity() < $p2->getQuantity()) ? 1 : -1)
            );
            if (!empty($priceByQuantity)) {
                return $priceByQuantity[0]->getPrices();
            }
        }
        return $this->prices;
    }
}
