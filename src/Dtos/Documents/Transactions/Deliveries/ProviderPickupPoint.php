<?php

namespace SDK\Dtos\Documents\Transactions\Deliveries;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Location;

/**
 * This is the Documents base ProviderPickupPoint class.
 * The base prices information will be stored in that class and will remain immutable (only get methods are available)
 * 
 * @see ProviderPickupPoint::getKey()
 * @see ProviderPickupPoint::getName()
 * @see ProviderPickupPoint::getEmail()
 * @see ProviderPickupPoint::getCity()
 * @see ProviderPickupPoint::getPostalCode()
 * @see ProviderPickupPoint::getAddress()
 * @see ProviderPickupPoint::getAddressAdditionalInformation()
 * @see ProviderPickupPoint::getNumber()
 * @see ProviderPickupPoint::getPhone()
 * @see ProviderPickupPoint::getMobile()
 * @see ProviderPickupPoint::getLocation()
 *
 * @uses ElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Documents
 */
class ProviderPickupPoint {
    use ElementTrait, EnumResolverTrait, IdentifiableElementTrait;

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

    protected ?Location $location = null;

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
     * @return Location|NULL
     */
    public function getLocation(): ?Location {
        return $this->location;
    }

    protected function setLocation(array $location): void {
        $this->location = new Location($location);
    }
}
