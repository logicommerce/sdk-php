<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the product availability class.
 * The product availability of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductAvailability::getIntervals()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ProductAvailability extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected array $intervals = [];

    /**
     * Returns a collection of intervals for this product availability object.
     *
     * @see ProductAvailabilityInterval
     * @return ProductAvailabilityInterval[]
     */
    public function getIntervals(): array {
        return $this->intervals;
    }

    protected function setIntervals(array $intervals): void {
        $this->intervals = $this->setArrayField($intervals, ProductAvailabilityInterval::class);
    }
}
