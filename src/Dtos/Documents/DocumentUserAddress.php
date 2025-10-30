<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Dtos\Location;

/**
 * This is the main document user address class.
 * The document user address will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentUserAddress::getAlias()
 * @see DocumentUserAddress::getFirstName()
 * @see DocumentUserAddress::getLastName()
 * @see DocumentUserAddress::getCompany()
 * @see DocumentUserAddress::getAddress()
 * @see DocumentUserAddress::getAddressAdditionalInformation()
 * @see DocumentUserAddress::getNumber()
 * @see DocumentUserAddress::getCity()
 * @see DocumentUserAddress::getState()
 * @see DocumentUserAddress::getPostalCode()
 * @see DocumentUserAddress::getVat()
 * @see DocumentUserAddress::getNif()
 * @see DocumentUserAddress::getLocation()
 * @see DocumentUserAddress::getPhone()
 * @see DocumentUserAddress::getMobile()
 * @see DocumentUserAddress::getFax()
 * @see DocumentUserAddress::getCountry()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Documents
 */
abstract class DocumentUserAddress extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected string $alias = '';

    protected string $firstName = '';

    protected string $lastName = '';

    protected string $company = '';

    protected string $address = '';

    protected string $addressAdditionalInformation = '';

    protected string $number = '';

    protected string $city = '';

    protected string $state = '';

    protected string $postalCode = '';

    protected string $vat = '';

    protected string $nif = '';

    protected ?Location $location = null;

    protected string $phone = '';

    protected string $mobile = '';

    protected string $fax = '';

    protected string $country = '';

    /**
     * Returns user alias.
     *
     * @return string
     */
    public function getAlias(): string {
        return $this->alias;
    }

    /**
     * Returns user first name.
     *
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * Returns user last name.
     *
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * Returns user company.
     *
     * @return string
     */
    public function getCompany(): string {
        return $this->company;
    }

    /**
     * Returns user address.
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * Returns house or building number.
     *
     * @return string
     */
    public function getAddressAdditionalInformation(): string {
        return $this->addressAdditionalInformation;
    }

    /**
     * Returns user address number.
     *
     * @return string
     */
    public function getNumber(): string {
        return $this->number;
    }

    /**
     * Returns name of the city.
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * Returns state or province.
     *
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }

    /**
     * Returns postal code.
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }

    /**
     * Returns company tax number.
     *
     * @return string
     */
    public function getVat(): string {
        return $this->vat;
    }

    /**
     * Returns user identity number or code.
     *
     * @return string
     */
    public function getNif(): string {
        return $this->nif;
    }

    /**
     * Returns user location.
     *
     * @return Location
     */
    public function getLocation(): Location {
        return $this->location;
    }

    protected function setLocation(array $location): void {
        $this->location = new Location($location);
    }

    /**
     * Returns user phone number.
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns user mobile phone number.
     *
     * @return string
     */
    public function getMobile(): string {
        return $this->mobile;
    }

    /**
     * Returns user fax.
     *
     * @return string
     */
    public function getFax(): string {
        return $this->fax;
    }

    /**
     * Returns user country name.
     *
     * @return string
     */
    public function getCountry(): string {
        return $this->country;
    }
}
