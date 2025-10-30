<?php

namespace SDK\Dtos\Documents\Transactions\Deliveries;

use SDK\Dtos\Catalog\PhysicalLocation;

/**
 * This is the Documents base PhysicalLocationPickingDelivery class.
 * The base prices information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PhysicalLocationPickingDelivery::getPhysicalLocation()
 *
 * @see PickingDeliveryMode
 *
 * @package SDK\Dtos\Documents
 */
class PhysicalLocationPickingDelivery extends PickingDeliveryMode {

    protected ?PhysicalLocation $physicalLocation = null;

    /**
     * Returns the physicalLocation.
     *
     * @return null|PhysicalLocation
     */
    public function getPhysicalLocation(): ?PhysicalLocation {
        return $this->physicalLocation;
    }

    protected function setPhysicalLocation($physicalLocation) {
        $this->physicalLocation = new PhysicalLocation($physicalLocation);
    }
}
