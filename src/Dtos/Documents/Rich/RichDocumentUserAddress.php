<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the rich document user address class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentUserAddress::getAlias()
 * @see RichDocumentUserAddress::getFirstName()
 * @see RichDocumentUserAddress::getLastName()
 * @see RichDocumentUserAddress::getCompany()
 * @see RichDocumentUserAddress::getAddress()
 * @see RichDocumentUserAddress::getAddressAdditionalInformation()
 * @see RichDocumentUserAddress::getNumber()
 * @see RichDocumentUserAddress::getCity()
 * @see RichDocumentUserAddress::getState()
 * @see RichDocumentUserAddress::getPostalCode()
 * @see RichDocumentUserAddress::getVat()
 * @see RichDocumentUserAddress::getNif()
 * @see RichDocumentUserAddress::getLocation()
 * @see RichDocumentUserAddress::getPhone()
 * @see RichDocumentUserAddress::getMobile()
 * @see RichDocumentUserAddress::getFax()
 * @see RichDocumentUserAddress::getTax()
 * @see RichDocumentUserAddress::getRe()
 * @see RichDocumentUserAddress::getReverseChargeVat()
 * @see RichDocumentUserAddress::getCountry()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentUserAddress extends Element{
    use ElementTrait, EnumResolverTrait;

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

    protected ?RichLocation $location = null;

    protected string $phone = '';

    protected string $mobile = '';

    protected string $fax = '';

    protected bool $tax = false;

    protected bool $re = false;

    /**
     * @deprecated
     */
    protected bool $reverseChargeVat = false;

    protected string $country = '';

    /**
     * Returns the rich document user address alias.
     *
     * @return string
     */
    public function getAlias() : string {
        return $this->alias;
    }

    /**
     * Returns the rich document user address firstName.
     *
     * @return string
     */
    public function getFirstName() : string {
        return $this->firstName;
    }

    /**
     * Returns the rich document user address lastName.
     *
     * @return string
     */
    public function getLastName() : string {
        return $this->lastName;
    }

    /**
     * Returns the rich document user address company.
     *
     * @return string
     */
    public function getCompany() : string {
        return $this->company;
    }

    /**
     * Returns the rich document user address address.
     *
     * @return string
     */
    public function getAddress() : string {
        return $this->address;
    }

    /**
     * Returns the rich document user address addressAdditionalInformation.
     *
     * @return string
     */
    public function getAddressAdditionalInformation() : string {
        return $this->addressAdditionalInformation;
    }

    /**
     * Returns the rich document user address number.
     *
     * @return string
     */
    public function getNumber() : string {
        return $this->number;
    }

    /**
     * Returns the rich document user address city.
     *
     * @return string
     */
    public function getCity() : string {
        return $this->city;
    }

    /**
     * Returns the rich document user address state.
     *
     * @return string
     */
    public function getState() : string {
        return $this->state;
    }

    /**
     * Returns the rich document user address postalCode.
     *
     * @return string
     */
    public function getPostalCode() : string {
        return $this->postalCode;
    }

    /**
     * Returns the rich document user address vat.
     *
     * @return string
     */
    public function getVat() : string {
        return $this->vat;
    }

    /**
     * Returns the rich document user address nif.
     *
     * @return string
     */
    public function getNif() : string {
        return $this->nif;
    }

    /**
     * Returns the rich document user address address location.
     *
     * @return RichLocation|NULL
     */
    public function getLocation(): ?RichLocation {
        return $this->location;
    }

    protected function setLocation(array $location): void {
        $this->location = new RichLocation($location);
    }

    /**
     * Returns the rich document user address phone.
     *
     * @return string
     */
    public function getPhone() : string {
        return $this->phone;
    }

    /**
     * Returns the rich document user address mobile.
     *
     * @return string
     */
    public function getMobile() : string {
        return $this->mobile;
    }

    /**
     * Returns the rich document user address fax.
     *
     * @return string
     */
    public function getFax() : string {
        return $this->fax;
    }

    /**
     * Returns the rich document user address tax.
     *
     * @return bool
     */
    public function getTax() : bool {
        return $this->tax;
    }

    /**
     * Returns the rich document user address re.
     *
     * @return bool
     */
    public function getRe() : bool {
        return $this->re;
    }

    /**
     * Returns the rich document user address reverseChargeVat.
     *
     * @deprecated
     * @return bool
     */
    public function getReverseChargeVat() : bool {
        return $this->reverseChargeVat;
    }

    /**
     * Returns the rich document user address country.
     *
     * @return string
     */
    public function getCountry() : string {
        return $this->country;
    }

}









