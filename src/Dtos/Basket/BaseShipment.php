<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\ShippingCalculation;

/**
 * This is the base shipment class.
 * The base shipments information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BaseShipment::getOriginWarehouseGroupId()
 * @see BaseShipment::getShippingCalculation()
 * @see BaseShipment::getDestinationZone()
 * @see BaseShipment::getRows()
 * @see BaseShipment::getHash()
 *
 * @see Element
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Basket
 */
abstract class BaseShipment extends Element {
    use EnumResolverTrait;

    protected int $originWarehouseGroupId = 0;

    protected string $shippingCalculation = '';

    protected ?GeographicalZone $destinationZone = null;

    protected array $rows = [];

    protected string $hash = '';

    /**
     * Returns the shipment origin warehouse group internal id.
     *
     * @return int
     */
    public function getOriginWarehouseGroupId(): int {
        return $this->originWarehouseGroupId;
    }

    /**
     * Returns the shipment shipping calculation.
     *
     * @return string
     */
    public function getShippingCalculation(): string { // ENUM
        return $this->getEnum(ShippingCalculation::class, $this->shippingCalculation, ShippingCalculation::BY_WEIGHT);
    }

    /**
     * Returns the shipment destination zone.
     *
     * @return GeographicalZone|NULL
     */
    public function getDestinationZone(): ?GeographicalZone {
        return $this->destinationZone;
    }

    protected function setDestinationZone(array $destinationZone): void {
        $this->destinationZone = new GeographicalZone($destinationZone);
    }

    /**
     * Returns the shipment rows.
     *
     * @return ShipmentRow[]
     */
    public function getRows(): array {
        return $this->rows;
    }

    protected function setRows(array $rows): void {
        $this->rows = $this->setArrayField($rows, ShipmentRow::class);
    }

    /**
     * Returns the shipment hash.
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }
}
