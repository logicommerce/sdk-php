<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Basket\BasketWarnings\BasketWarning;
use SDK\Enums\DeliveryType;
use SDK\Core\Dtos\Factories\ShipmentFactory;
use SDK\Dtos\Basket\DeliveryRow;
use SDK\Dtos\Basket\GeographicalZone;

/**
 * This is the delivery class.
 * The basket delivery information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Delivery::getType()
 * @see Delivery::getZone()
 * @see Delivery::getDeliveryRows()
 * @see Delivery::getShipments()
 * @see Delivery::getHash()
 * @see Delivery::getSelected()
 * @see Delivery::getCanBeShipped()
 * @see Delivery::getMultiShipment()
 *
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Basket
 */
abstract class Delivery extends Element {
    use ElementTrait, EnumResolverTrait;

    protected string $type = '';

    protected array $deliveryRows = [];

    protected array $shipments = [];

    protected string $hash = '';

    protected bool $canBeShipped = false;

    protected bool $multiShipment = false;

    protected ?GeographicalZone $zone = null;

    /**
     * Returns the delivery type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(DeliveryType::class, $this->type, DeliveryType::SHIPPING);
    }

    /**
     * Returns the delivery zone.
     *
     * @return GeographicalZone|NULL
     */
    public function getZone(): ?GeographicalZone {
        return $this->zone;
    }

    protected function setZone(array $zone): void {
        $this->zone = new GeographicalZone($zone);
    }

    /**
     * Returns the delivery deliveryRows.
     *
     * @return DeliveryRow[]
     */
    public function getDeliveryRows(): array {
        return $this->deliveryRows;
    }

    protected function setDeliveryRows(array $deliveryRows): void {
        $this->deliveryRows = $this->setArrayField($deliveryRows, DeliveryRow::class);
    }

    /**
     * Returns the delivery shipments.
     *
     * @return Shipment[]|BasketShipment[]
     */
    public function getShipments(): array {
        return $this->shipments;
    }

    protected function setShipments(array $shipments): void {
        $this->shipments = $this->setArrayField($shipments, ShipmentFactory::class);
    }

    /**
     * Returns the delivery hash.
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }

    /**
     * Returns if the delivery is the canBeShipped one.
     *
     * @return bool
     */
    public function getCanBeShipped(): bool {
        return $this->canBeShipped;
    }

    /**
     * Returns if the delivery is the multiShipment one.
     *
     * @return bool
     */
    public function getMultiShipment(): bool {
        return $this->multiShipment;
    }

    /**
     * Returns all the warnings inside the delivery rows array.
     *
     * @return BasketWarning[]
     */
    public function getAllBasketWarnings(): array {
        $warnings = [];
        $deliveryRows = $this->getDeliveryRows();
        foreach ($deliveryRows as $row) {
            $warnings = [...$warnings, ...$row->getBasketWarnings()];
        }
        return $warnings;
    }
}
