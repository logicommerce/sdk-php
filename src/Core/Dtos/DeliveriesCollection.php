<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Filter\FilterDeliveries;
use SDK\Core\Dtos\Filter\FilterPhysicalLocations;

/**
 * This is the Incidence Save For Later List Row Collection class
 *
 * @see DeliveriesCollection::getCountries()
 *
 * @see ElementCollection
 *
 * @package SDK\Core\Dtos
 */
class DeliveriesCollection extends ElementCollection {

    protected function setFilter(array $filter): void {
        $this->filter = new FilterDeliveries($filter);
    }
}
