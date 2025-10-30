<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CustomerType;

/**
 * Represents an invoicing address.
 * 
 * @see PurchaseAddress
 * @see InvoicingAddress::isTax()
 * @see InvoicingAddress::isRe()
 * @see InvoicingAddress::isReverseChargeVat()
 * @see InvoicingAddress::getCustomerType()
 * 
 * @property bool $tax
 * @property bool $re
 * @property bool $reverseChargeVat
 * @property string $customerType
 * 
 * @package SDK\Dtos\Accounts
 */
class InvoicingAddress extends PurchaseAddress {
    use EnumResolverTrait;

    protected bool $tax = false;

    protected bool $re = false;

    protected bool $reverseChargeVat = false;

    protected string $customerType = '';

    /**
     * Returns if tax is applied.
     * 
     * @return bool
     */
    public function isTax(): bool {
        return $this->tax;
    }

    /**
     * Returns if reverse charge VAT is applied.
     * 
     * @return string
     */
    public function isRe(): bool {
        return $this->re;
    }

    /**
     * Returns if reverse charge VAT is applied.
     * 
     * @return string
     */
    public function isReverseChargeVat(): bool {
        return $this->reverseChargeVat;
    }

    /**
     * Returns the customer type.
     * 
     * @return string
     */
    public function getCustomerType(): string {
        return $this->getEnum(CustomerType::class, $this->customerType, CustomerType::EMPTY);
    }

    protected function setCustomerType(string $customerType): void {
        switch ($customerType) {
            case 'PARTICULAR':
                $this->customerType = CustomerType::INDIVIDUAL;
                return;
            case 'BUSINESS':
                $this->customerType = CustomerType::COMPANY;
                return;
            case '':
                $this->customerType = CustomerType::EMPTY;
                return;
        }
        $this->customerType = CustomerType::tryFrom($customerType);
    }
}
