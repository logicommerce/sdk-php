<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Dtos\Element;
use SDK\Dtos\Location;

/**
 * This is the physical location class.
 * The information of API physical locations will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PhysicalLocation::getActive()
 * @see PhysicalLocation::getPhone()
 * @see PhysicalLocation::getEmail()
 * @see PhysicalLocation::getAddress()
 * @see PhysicalLocation::getPostalCode()
 * @see PhysicalLocation::getCity()
 * @see PhysicalLocation::getState()
 * @see PhysicalLocation::getLocation()
 * @see PhysicalLocation::getVisibleOnMap()
 * @see PhysicalLocation::getZoneRadius()
 * @see PhysicalLocation::getDeliveryPoint()
 * @see PhysicalLocation::getReturnPoint()
 * @see PhysicalLocation::getLanguage()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses ElementNameTrait
 * @uses IdentifiableElementTrait
 * @uses IntegrableElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class PhysicalLocation extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, ElementNameTrait;

    protected bool $active = false;

    protected string $phone = '';

    protected string $email = '';

    protected string $address = '';

    protected string $postalCode = '';

    protected string $city = '';

    protected string $state = '';

    protected ?Location $location = null;

    protected bool $visibleOnMap = false;

    protected float $zoneRadius = 0.0;

    protected bool $deliveryPoint = false;

    protected bool $returnPoint = false;

    protected ?PhysicalLocationLanguage $language = null;

    /**
     * Returns the physichal location active.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Returns the physichal location phone.
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns the physichal location email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the physichal location address.
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * Returns the physichal location postal code.
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }

    /**
     * Returns the physichal location city.
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * Returns the physichal location state.
     *
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }

    /**
     * Returns the location of the physichal location.
     *
     * @return Location|NULL
     */
    public function getLocation(): ?Location {
        return $this->location;
    }

    protected function setLocation(array $location): void {
        $this->location = new Location($location);
    }

    /**
     * Returns if the physichal location is visible on map.
     *
     * @return bool
     */
    public function getVisibleOnMap(): bool {
        return $this->visibleOnMap;
    }

    /**
     * Returns the physichal location zone radius.
     *
     * @return float
     */
    public function getZoneRadius(): float {
        return $this->zoneRadius;
    }

    /**
     * Returns if the physichal location is a delivery point.
     *
     * @return bool
     */
    public function getDeliveryPoint(): bool {
        return $this->deliveryPoint;
    }

    /**
     * Returns if the physichal location is a refund point.
     *
     * @return bool
     */
    public function getReturnPoint(): bool {
        return $this->returnPoint;
    }

    /**
     * Returns the language of the physichal location.
     *
     * @return PhysicalLocationLanguage|NULL
     */
    public function getLanguage(): ?PhysicalLocationLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new PhysicalLocationLanguage($language);
    }
    
}
