<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the product availability class.
 * The product availability of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductAvailabilityInterval::getstock()
 * @see ProductAvailabilityInterval::getLanguage()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ProductAvailabilityInterval {
    use ElementTrait;

    protected int $stock = 0;

    protected ?ProductAvailabilityIntervalLanguage $language = null;

    /**
     * Returns the stock of this product availability interval object.
     *
     * @return int
     */
    public function getStock(): int {
        return $this->stock;
    }

    /**
     * Returns the product availability language object.
     *
     * @see ProductAvailabilityIntervalLanguage
     * @return ProductAvailabilityIntervalLanguage|NULL
     */
    public function getLanguage(): ?ProductAvailabilityIntervalLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new ProductAvailabilityIntervalLanguage($language);
    }
}
