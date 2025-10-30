<?php

namespace SDK\Dtos\Documents\Rich;

/**
 * This is the rich shipping document delivery class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichPickupPointPhysicalLocationPickingDocumentDelivery::getPhysicalLocation()
 * 
 * @see RichPickingModeDocumentDelivery
 * 
 * @package SDK\Dtos\Documents\Rich
 */
class RichPickupPointPhysicalLocationPickingDocumentDelivery extends RichPickingModeDocumentDelivery {

    protected ?RichDocumentDeliveryPhysicalLocation $physicalLocation = null;

    /**
     * Returns the rich document delivery physicalLocation.
     *
     * @return RichDocumentDeliveryPhysicalLocation|NULL
     */
    public function getPhysicalLocation(): ?RichDocumentDeliveryPhysicalLocation {
        return $this->physicalLocation;
    }

    protected function setPhysicalLocation(array $physicalLocation): void {
        $this->physicalLocation = new RichDocumentDeliveryPhysicalLocation($physicalLocation);
    }
}
