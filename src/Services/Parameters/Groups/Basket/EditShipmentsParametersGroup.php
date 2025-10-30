<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\ShipmentsParametersValidator;

/**
 * This is the basket model (set shipments resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class EditShipmentsParametersGroup extends ParametersGroup {

    protected string $deliveryHash;

    protected array $shipments;

    protected string $providerPickupPointHash;

    /**
     * Sets the delivery hash parameter for this parameters group.
     *
     * @param string $deliveryHash
     *
     * @return void
     */
    public function setDeliveryHash(string $deliveryHash): void {
        $this->deliveryHash = $deliveryHash;
    }

    /**
     * Sets an array of shipments as a parameter for this parameters group.
     *
     * @param EditShipmentParametersGroup[] $shipments
     *
     * @return void
     */
    public function setShipments(array $shipments): void {
        $this->shipments = [];
        foreach ($shipments as $shipment) {
            $this->addShipment($shipment);
        }
    }

    /**
     * Adds a new shipment to the array of shipments for this parameters group.
     *
     * @param EditShipmentParametersGroup $shipment
     *
     * @return void
     */
    public function addShipment(EditShipmentParametersGroup $shipment): void {
        $this->shipments ??= [];
        $this->shipments[] = $shipment;
    }

    /**
     * Sets a providerPickupPointHash as a parameter for this parameters group.
     *
     * @param string $providerPickupPointHash
     *
     * @return void
     */
    public function setProviderPickupPointHash(string $providerPickupPointHash): void {
        $this->providerPickupPointHash = $providerPickupPointHash;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ShipmentsParametersValidator {
        return new ShipmentsParametersValidator();
    }
}
