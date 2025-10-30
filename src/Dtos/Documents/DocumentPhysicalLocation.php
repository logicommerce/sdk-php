<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\GeographicalZone;
use SDK\Dtos\Coordinate;

/**
 * This is the DocumentPhysicalLocation class.
 * The Document Deliveries will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentPhysicalLocation::getGeographicalZone()
 * @see DocumentPhysicalLocation::getCoordinate()
 * @see DocumentPhysicalLocation::getAddress()
 * @see DocumentPhysicalLocation::getCity()
 * @see DocumentPhysicalLocation::getState()
 * @see DocumentPhysicalLocation::getPostalCode()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Documents
 */
class DocumentPhysicalLocation extends Element {
    use ElementTrait, ElementNameTrait;

    protected ?GeographicalZone $geographicalZone = null;

    protected ?Coordinate $coordinate = null;

    protected string $address = '';

    protected string $city = '';

    protected string $state = '';

    protected string $postalCode = '';

    /**
     * Returns the document delivery physical location geographical zone.
     *
     * @return GeographicalZone
     */
    public function getGeographicalZone(): ?GeographicalZone {
        return $this->geographicalZone;
    }

    protected function setGeographicalZone(array $geographicalZone): void {
        $this->geographicalZone = new GeographicalZone($geographicalZone);
    }

    /**
     * Returns the document delivery physical location coordinate.
     *
     * @return Coordinate
     */
    public function getCoordinate(): ?Coordinate {
        return $this->coordinate;
    }

    protected function setCoordinate(array $coordinate): void {
        $this->coordinate = new Coordinate($coordinate);
    }

    /**
     * Returns the document delivery physical location address.
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * Returns the document delivery physical location city.
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * Returns the document delivery physical location state.
     *
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }

    /**
     * Returns the document delivery physical location postalCode.
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }
}
