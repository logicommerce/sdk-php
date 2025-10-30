<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\AccountAddressType;
use SDK\Enums\AddressType;

/**
 * This is the base address data class.
 * The base addresses information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BaseAddressData::getAlias()
 * @see BaseAddressData::getType()
 * @see BaseAddressData::getFirstName()
 * @see BaseAddressData::getLastName()
 * @see BaseAddressData::getCompany()
 * @see BaseAddressData::getAddress()
 * @see BaseAddressData::getAddressAdditionalInformation()
 * @see BaseAddressData::getNumber()
 * @see BaseAddressData::getCity()
 * @see BaseAddressData::getState()
 * @see BaseAddressData::getPostalCode()
 * @see BaseAddressData::getVat()
 * @see BaseAddressData::getNif()
 * @see BaseAddressData::getLocation()
 * @see BaseAddressData::getPhone()
 * @see BaseAddressData::getMobile()
 * @see BaseAddressData::getFax()
 * @see BaseAddressData::getTax()
 * @see BaseAddressData::getRe()
 * @see BaseAddressData::getReverseChargeVat()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos
 */
abstract class BaseAddressData extends Element {
    use IdentifiableElementTrait, EnumResolverTrait;

    protected string $alias = '';

    protected string $type = '';

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

    protected bool $tax = true;

    protected bool $re = false;

    protected bool $reverseChargeVat = false;

    /**
     * Returns the address alias.
     *
     * @return string
     */
    public function getAlias(): string {
        return $this->alias;
    }

    /**
     * Returns the address type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(AddressType::class, $this->type, AddressType::BILLING);
    }

    protected function setType(string $type): void { // ENUM
        if ($type === AccountAddressType::INVOICING) {
            $this->type = AddressType::BILLING;
        } else {
            $this->type = $type;
        }
    }

    /**
     * Returns the user's address first name.
     *
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * Returns the user's address lastName.
     *
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * Returns the address company.
     *
     * @return string
     */
    public function getCompany(): string {
        return $this->company;
    }

    /**
     * Returns the address address (street and other filled data in this field).
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * Returns the address additional information.
     *
     * @return string
     */
    public function getAddressAdditionalInformation(): string {
        return $this->addressAdditionalInformation;
    }

    /**
     * Returns the address number.
     *
     * @return string
     */
    public function getNumber(): string {
        return $this->number;
    }

    /**
     * Returns the address city.
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * Returns the address state.
     *
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }

    /**
     * Returns the address postalCode.
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }

    /**
     * Returns the address vat.
     *
     * @return string
     */
    public function getVat(): string {
        return $this->vat;
    }

    /**
     * Returns the address nif.
     *
     * @return string
     */
    public function getNif(): string {
        return $this->nif;
    }

    /**
     * Returns the address location.
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
     * Returns the address phone.
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns the address mobile.
     *
     * @return string
     */
    public function getMobile(): string {
        return $this->mobile;
    }

    /**
     * Returns the address fax.
     *
     * @return string
     */
    public function getFax(): string {
        return $this->fax;
    }

    /**
     * Returns if the address applies taxes.
     *
     * @return bool
     */
    public function getTax(): bool {
        return $this->tax;
    }

    /**
     * Returns if the address applies RE.
     *
     * @return bool
     */
    public function getRe(): bool {
        return $this->re;
    }

    /**
     * Returns if the address applies with the reverse charge vat.
     *
     * @return bool
     */
    public function getReverseChargeVat(): bool {
        return $this->reverseChargeVat;
    }
}
