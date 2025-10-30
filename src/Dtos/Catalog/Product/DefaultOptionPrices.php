<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the default option prices class.
 * The prices of products default option items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DefaultOptionPrices::getPrices()
 * @see DefaultOptionPrices::getPricesWithTaxes()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class DefaultOptionPrices {
    use ElementTrait;

    protected ?Prices $prices = null;

    protected ?Prices $pricesWithTaxes = null;

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
     * Returns the item pricesWithTaxes object.
     *
     * @see Prices
     * @return Prices|NULL
     */
    public function getPricesWithTaxes(): ?Prices {
        return $this->pricesWithTaxes;
    }

    protected function setPricesWithTaxes(array $pricesWithTaxes): void {
        $this->pricesWithTaxes = new Prices($pricesWithTaxes);
    }
}
