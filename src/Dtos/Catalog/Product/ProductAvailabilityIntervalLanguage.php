<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;

/**
 * This is the product availability class.
 * The product availability of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductAvailabilityIntervalLanguage::getImage()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ProductAvailabilityIntervalLanguage {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait;

    protected string $image = '';

    /**
     * Returns the class product availability interval image for the website current language.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }
}
