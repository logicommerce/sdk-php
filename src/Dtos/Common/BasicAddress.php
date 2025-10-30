<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Location;

/**
 * Basic address class.
 * 
 * @see BasicAddress::getAddress()
 * @see BasicAddress::getAddressAdditionalInformation()
 * @see BasicAddress::getNumber()
 * @see BasicAddress::getCity()
 * @see BasicAddress::getState()
 * @see BasicAddress::getPostalCode()
 * @see BasicAddress::getLocation()
 * @see BasicAddress::getPhone()
 * @see BasicAddress::getMobile()
 * @see BasicAddress::getFax()
 * 
 * @package SDK\Dtos\Common
 */
abstract class BasicAddress extends Element {
    use ElementTrait;

    protected string $address = '';
    protected string $addressAdditionalInformation = '';
    protected string $number = '';
    protected string $city = '';
    protected string $state = '';
    protected string $postalCode = '';
    protected ?Location $location = null;
    protected string $phone = '';
    protected string $mobile = '';
    protected string $fax = '';

    /**
     * Returns the address.
     * 
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * Returns the additional information of the address.
     * 
     * @return string
     */
    public function getAddressAdditionalInformation(): string {
        return $this->addressAdditionalInformation;
    }

    /**
     * Returns the number of the address.
     * 
     * @return string
     */
    public function getNumber(): string {
        return $this->number;
    }

    /**
     * Returns the city of the address.
     * 
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * Returns the state of the address.
     * 
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }

    /**
     * Returns the postal code of the address.
     * 
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }

    /**
     * Returns the location of the address.
     * 
     * @return Location
     */
    public function getLocation(): ?Location {
        return $this->location;
    }

    protected function setLocation(array $location): void {
        $this->location = new Location($location);
    }

    /**
     * Returns the phone of the address.
     * 
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns the mobile of the address.
     * 
     * @return string
     */
    public function getMobile(): string {
        return $this->mobile;
    }

    /**
     * Returns the fax of the address. Anyones still use fax?
     * 
     * @return string
     */
    public function getFax(): string {
        return $this->fax;
    }
}
