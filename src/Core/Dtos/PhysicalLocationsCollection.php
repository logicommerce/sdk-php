<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Filter\FilterPhysicalLocations;

/**
 * This is the Incidence Save For Later List Row Collection class
 *
 * @see PhysicalLocationsCollection::getCountries()
 *
 * @see ElementCollection
 *
 * @package SDK\Core\Dtos
 */
class PhysicalLocationsCollection extends ElementCollection {

    protected function setFilter(array $filter): void {
        $this->filter = new FilterPhysicalLocations($filter);
    }
}
