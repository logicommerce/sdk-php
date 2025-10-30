<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CustomerType;

/**
 * This is the account address header main class.
 * The account address header information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AccountAddressHeader::getCustomerType()
 *
 * @see AccountAddressHeaderReduced
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Accounts
 */
class AccountAddressHeader extends AccountAddressHeaderReduced {
    use EnumResolverTrait;

    protected string $customerType = '';

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
