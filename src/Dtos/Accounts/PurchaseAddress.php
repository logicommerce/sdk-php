<?php

namespace SDK\Dtos\Accounts;

use SDK\Dtos\Common\BasicAddress;

/**
 * Purchase address class.
 * 
 * @see BasicAddress
 * @see PurchaseAddress::getAlias()
 * @see PurchaseAddress::getFirstName()
 * @see PurchaseAddress::getLastName()
 * @see PurchaseAddress::getCompany()
 * @see PurchaseAddress::getVat()
 * @see PurchaseAddress::getNif()
 * @see PurchaseAddress::getType()
 * 
 * @package SDK\Dtos\Accounts
 */
abstract class PurchaseAddress extends BasicAddress {

    protected string $alias = '';
    protected string $firstName = '';
    protected string $lastName = '';
    protected string $company = '';
    protected string $vat = '';
    protected string $nif = '';

    /**
     * Returns the alias.
     *
     * @return string
     */
    public function getAlias(): string {
        return $this->alias;
    }

    /**
     * Returns the first name.
     *
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * Returns the last name.
     *
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * Returns the company.
     *
     * @return string
     */
    public function getCompany(): string {
        return $this->company;
    }
    /**
     * Returns the VAT.
     *
     * @return string
     */
    public function getVat(): string {
        return $this->vat;
    }
    /**
     * Returns the NIF.
     *
     * @return string
     */
    public function getNif(): string {
        return $this->nif;
    }
}
