<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\ShipmentParametersValidator;

/**
 * This is the basket model (set shipments resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class EditShipmentParametersGroup extends ParametersGroup {

    protected string $selectedShippingHash;

    protected string $shipmentHash;

    /**
     * Sets the selected shipping hash parameter for this parameters group.
     *
     * @param string $selectedShippingHash
     *
     * @return void
     */
    public function setSelectedShippingHash(string $selectedShippingHash): void {
        $this->selectedShippingHash = $selectedShippingHash;
    }

    /**
     * Sets the selected shipment hash parameter for this parameters group.
     *
     * @param string $shipmentHash
     *
     * @return void
     */
    public function setShipmentHash(string $shipmentHash): void {
        $this->shipmentHash = $shipmentHash;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ShipmentParametersValidator {
        return new ShipmentParametersValidator();
    }
}
