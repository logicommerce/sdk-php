<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CustomerType;

/**
 * AccountInvoicingAddress class.
 * 
 * @see AccountAddress
 * 
 * @package SDK\Dtos\Accounts
 */
class AccountInvoicingAddress extends AccountAddress {
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
