<?php

namespace SDK\Core\Dtos\Catalog;

use SDK\Core\Dtos\Element;

/**
 * This is the Bundle Combination Data lass.
 * The API BundleCombinationData data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CombinationData::getPrices()
 * @see CombinationData::getPricesWithTaxes()
 *
 * @see Element
 * 
 * @package SDK\Core\Dtos
 */
abstract class BundleCombinationData extends Element {

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
