<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document delivery physical location class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentDeliveryPhysicalLocation::getPhysicalLocationPId()
 * @see RichDocumentDeliveryPhysicalLocation::getName()
 * @see RichDocumentDeliveryPhysicalLocation::getEmail()
 * @see RichDocumentDeliveryPhysicalLocation::getPhone()
 * @see RichDocumentDeliveryPhysicalLocation::getAddress()
 * @see RichDocumentDeliveryPhysicalLocation::getCity()
 * @see RichDocumentDeliveryPhysicalLocation::getState()
 * @see RichDocumentDeliveryPhysicalLocation::getPostalCode()
 * @see RichDocumentDeliveryPhysicalLocation::getLocation()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentDeliveryPhysicalLocation extends Element{
    use ElementTrait;

    protected string $physicalLocationPId = '';
    
    protected string $name = '';

    protected string $email = '';

    protected string $phone = '';
    
    protected string $address = '';
    
    protected string $city = '';
    
    protected string $state = '';

    protected string $postalCode = '';

    protected ?RichLocation $location = null;

    /**
     * Returns the rich document delivery physical location physicalLocationPId.
     *
     * @return string
     */
    public function getPhysicalLocationPId(): string {
        return $this->physicalLocationPId;
    }
    
    /**
     * Returns the rich document delivery physical location name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
    
    /**
     * Returns the rich document delivery physical location email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }
    
    /**
     * Returns the rich document delivery physical location Phone.
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns the rich document delivery physical location address.
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }
    
    /**
     * Returns the rich document delivery physical location city.
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }
    
    /**
     * Returns the rich document delivery physical location state.
     *
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }
    
    /**
     * Returns the rich document delivery physical location postalCode.
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }

    /**
     * Returns the rich document delivery physical location location.
     *
     * @return RichLocation|NULL
     */
    public function getLocation(): ?RichLocation {
        return $this->location;
    }

    protected function setLocation(array $location): void {
        $this->location = new RichLocation($location);
    }
    
}
