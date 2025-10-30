<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;

/**
 * This is the base users data parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
abstract class BaseUserDataParametersGroup extends ParametersGroup {

    protected string $firstName;

    protected string $lastName;

    protected string $company;

    protected string $address;

    protected string $addressAdditionalInformation;

    protected string $number;

    protected string $city;

    protected string $state;

    protected string $postalCode;

    protected string $vat;

    protected string $nif;

    protected string $phone;

    protected string $mobile;

    protected string $fax;

    protected LocationParametersGroup $location;

    /**
     * Sets the first name parameter for this parameters group.
     *
     * @param string $firstName
     *
     * @return void
     */
    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    /**
     * Sets the last name parameter for this parameters group.
     *
     * @param string $lastName
     *
     * @return void
     */
    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    /**
     * Sets the company parameter for this parameters group.
     *
     * @param string $company
     *
     * @return void
     */
    public function setCompany(string $company): void {
        $this->company = $company;
    }

    /**
     * Sets the address parameter for this parameters group.
     *
     * @param string $address
     *
     * @return void
     */
    public function setAddress(string $address): void {
        $this->address = $address;
    }

    /**
     * Sets the address additional information parameter for this parameters group.
     *
     * @param string $addressAdditionalInformation
     *
     * @return void
     */
    public function setAddressAdditionalInformation(string $addressAdditionalInformation): void {
        $this->addressAdditionalInformation = $addressAdditionalInformation;
    }

    /**
     * Sets the number parameter for this parameters group.
     *
     * @param string $number
     *
     * @return void
     */
    public function setNumber(string $number): void {
        $this->number = $number;
    }

    /**
     * Sets the city parameter for this parameters group.
     *
     * @param string $city
     *
     * @return void
     */
    public function setCity(string $city): void {
        $this->city = $city;
    }

    /**
     * Sets the state parameter for this parameters group.
     *
     * @param string $state
     *
     * @return void
     */
    public function setState(string $state): void {
        $this->state = $state;
    }

    /**
     * Sets the postal code parameter for this parameters group.
     *
     * @param string $postalCode
     *
     * @return void
     */
    public function setPostalCode(string $postalCode): void {
        $this->postalCode = $postalCode;
    }

    /**
     * Sets the vat parameter for this parameters group.
     *
     * @param string $vat
     *
     * @return void
     */
    public function setVat(string $vat): void {
        $this->vat = $vat;
    }

    /**
     * Sets the nif parameter for this parameters group.
     *
     * @param string $nif
     *
     * @return void
     */
    public function setNif(string $nif): void {
        $this->nif = $nif;
    }

    /**
     * Sets the phone parameter for this parameters group.
     *
     * @param string $phone
     *
     * @return void
     */
    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }

    /**
     * Sets the mobile parameter for this parameters group.
     *
     * @param string $mobile
     *
     * @return void
     */
    public function setMobile(string $mobile): void {
        $this->mobile = $mobile;
    }

    /**
     * Sets the fax parameter for this parameters group.
     *
     * @param string $fax
     *
     * @return void
     */
    public function setFax(string $fax): void {
        $this->fax = $fax;
    }

    /**
     * Sets the location parameter for this parameters group.
     *
     * @param LocationParametersGroup $location
     *
     * @return void
     */
    public function setLocation(LocationParametersGroup $location): void {
        $this->location = $location;
    }

    /**
     * Gets the location parameter for this parameters group.
     *
     * @return LocationParametersGroup
     */
    public function getLocation(): LocationParametersGroup {
        return $this->location;
    }
}
