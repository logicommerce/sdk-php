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
 * Represents an AccountLinked entity, used as a customer in a Basket.
 * 
 * @see Element
 * @see ElementTrait
 * @see InvoicingAddress
 * @see ShippingAddress
 * 
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
}
