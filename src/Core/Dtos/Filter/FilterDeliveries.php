<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the FilterDeliveries class.
 * The availables FilterDeliveries of the current navigation items will be stored in that class and
 * will remain immutable (only get methods are available)
 *
 * @see FilterDeliveries::getPhysicalLocations()
 *
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterDeliveries extends Element {
    use ElementTrait;

    private ?FilterPhysicalLocations $physicalLocations = null;

    /**
     * Returns an array of FilterDeliveriesOption.
     *
     * @return null|FilterDeliveriesOption
     */
    public function getPhysicalLocations(): ?FilterPhysicalLocations {
        return $this->physicalLocations;
    }

    private function setPhysicalLocations(array $physicalLocations): void {
        $this->physicalLocations = new FilterPhysicalLocations($physicalLocations);
    }
}
