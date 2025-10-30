<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Rich Provider PickupPoint Picking Document Delivery ProviderPickupPoint class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentProviderPickupPoint::getKey()
 * @see RichDocumentProviderPickupPoint::getName()
 * @see RichDocumentProviderPickupPoint::getEmail()
 * @see RichDocumentProviderPickupPoint::getCity()
 * @see RichDocumentProviderPickupPoint::getPostalCode()
 * @see RichDocumentProviderPickupPoint::getAddress()
 * @see RichDocumentProviderPickupPoint::getAddressAdditionalInformation()
 * @see RichDocumentProviderPickupPoint::getNumber()
 * @see RichDocumentProviderPickupPoint::getPhone()
 * @see RichDocumentProviderPickupPoint::getMobile()
 * @see RichDocumentProviderPickupPoint::getLocation()
 * 
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentProviderPickupPoint extends Element {
    use ElementTrait;

    protected string $key = '';

    protected string $name = '';

    protected string $email = '';

    protected string $city = '';

    protected string $postalCode = '';

    protected string $address = '';

    protected string $addressAdditionalInformation = '';

    protected string $number = '';

    protected string $phone = '';

    protected string $mobile = '';

    protected ?RichLocation $location = null;

    /**
     * Returns the key
     *
     * @return string
     */
    public function getKey(): string {
        return $this->key;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the city
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * Returns the postalCode
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }

    /**
     * Returns the address
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * Returns the addressAdditionalInformation
     *
     * @return string
     */
    public function getAddressAdditionalInformation(): string {
        return $this->addressAdditionalInformation;
    }

    /**
     * Returns the number
     *
     * @return string
     */
    public function getNumber(): string {
        return $this->number;
    }

    /**
     * Returns the phone
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns the mobile
     *
     * @return string
     */
    public function getMobile(): string {
        return $this->mobile;
    }

    /**
     * Returns the location.
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
