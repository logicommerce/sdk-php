<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the account address header main class.
 * The account address header information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AccountAddressHeaderReduced::getFirstName()
 * @see AccountAddressHeaderReduced::getLastName()
 * @see AccountAddressHeaderReduced::getCompany()
 *
 * @see Element
 * @uses IdentifiableElementTrait
 *
 * @package SDK\Dtos\Accounts
 */
class AccountAddressHeaderReduced extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected string $firstName = '';

    protected string $lastName = '';

    protected string $company = '';

    /**
     * Returns the first name.
     *
     * @return string
     */

    public function getFirstName(): string {
        return $this->firstName;
    }

    protected function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    /**
     * Returns the last name.
     *
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    protected function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    /**
     * Returns the company.
     *
     * @return string
     */
    public function getCompany(): string {
        return $this->company;
    }

    protected function setCompany(string $company): void {
        $this->company = $company;
    }
}
