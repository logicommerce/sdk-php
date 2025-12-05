<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\CustomTagValuesTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Accounts\InvoicingAddress;
use SDK\Dtos\Accounts\ShippingAddress;
use SDK\Enums\CustomerType;
use SDK\Enums\Gender;

/**
 * This is the base account linked main abstract class.
 * The account linked information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see AccountLinked::isAccountLinked()
 * @see AccountLinked::getType()
 * @see AccountLinked::getEmail()
 * @see AccountLinked::getGender()
 * @see AccountLinked::getBirthday()
 * @see AccountLinked::getInvoicingAddress()
 * @see AccountLinked::isUseShippingAddress()
 * @see AccountLinked::getShippingAddress()
 * @see AccountLinked::getSelectedInvoicingAddressId()
 * @see AccountLinked::getSelectedShippingAddressId()
 *
 * @see Element
 * @see ElementTrait
 * @see CustomTagValuesTrait
 * @see EnumResolverTrait
 * @see InvoicingAddress
 * @see ShippingAddress
 * @see CustomerType
 * @see Gender
 *
 * @package SDK\Dtos\Accounts
 */

abstract class AccountLinked extends Element {
    use ElementTrait, CustomTagValuesTrait, EnumResolverTrait;

    protected string $type = '';
    protected string $email = '';
    protected ?string $gender = null;
    protected string $birthday = '';
    protected ?InvoicingAddress $invoicingAddress = null;
    protected bool $useShippingAddress = false;
    protected ?ShippingAddress $shippingAddress = null;
    protected int $selectedInvoicingAddressId = 0;
    protected int $selectedShippingAddressId = 0;

    /**
     * Check if the account is linked.
     *
     * @return bool
     */
    abstract function isAccountLinked(): bool;

    /**
     * Get the type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(CustomerType::class, $this->type, CustomerType::EMPTY);
    }

    protected function setType(string $type): void {
        switch ($type) {
            case 'PARTICULAR':
                $this->type = CustomerType::INDIVIDUAL;
                return;
            case 'BUSINESS':
                $this->type = CustomerType::COMPANY;
                return;
            case '':
                $this->type = CustomerType::EMPTY;
                return;
        }
        $this->type = CustomerType::tryFrom($type);
    }

    /**
     * Get the email.
     *
     * @return ?string
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * Get the gender.
     *
     * @return string | null
     */
    public function getGender(): ?string {
        if (is_null($this->gender)) {
            return null;
        }
        return $this->getEnum(Gender::class, $this->gender, '');
    }

    /**
     * Get the birthday.
     *
     * @return ?string
     */
    public function getBirthday(): ?string {
        return $this->birthday;
    }

    /**
     * Get the invoicing address.
     *
     * @return ?InvoicingAddress
     */
    public function getInvoicingAddress(): ?InvoicingAddress {
        return $this->invoicingAddress;
    }

    protected function setInvoicingAddress(array $invoicingAddress): void {
        $this->invoicingAddress = new InvoicingAddress($invoicingAddress);
    }

    /**
     * Check if the shipping address is used.
     *
     * @return bool
     */
    public function isUseShippingAddress(): bool {
        return $this->useShippingAddress;
    }

    /**
     * Get the shipping address.
     *
     * @return ?ShippingAddress
     */
    public function getShippingAddress(): ?ShippingAddress {
        return $this->shippingAddress;
    }

    protected function setShippingAddress(array $shippingAddress): void {
        $this->shippingAddress = new ShippingAddress($shippingAddress);
    }

    /**
     * Returns the user selected invoicing address internal identifier.
     *
     * @return int
     */
    public function getSelectedInvoicingAddressId(): int {
        return $this->selectedInvoicingAddressId;
    }

    /**
     * Returns the user selected shipping address internal identifier.
     *
     * @return int
     */
    public function getSelectedShippingAddressId(): int {
        return $this->selectedShippingAddressId;
    }
}
