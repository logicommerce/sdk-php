<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account\Addresses;

use SDK\Services\Parameters\Validators\Account\AccountInvoicingAddressCompatibleParametersValidator;

/**
 * Account Invoicing Address Compatible Parameters Group
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class AccountInvoicingAddressCompatibleParametersGroup extends AccountInvoicingAddressParametersGroup {

    protected string $customerType;

    /**
     * Sets the customer type.
     *
     * @param string $customerType
     *
     * @return void
     */
    public function setCustomerType(string $customerType): void {
        $this->customerType = $customerType;
    }


    protected function getValidator(): AccountInvoicingAddressCompatibleParametersValidator {
        return new AccountInvoicingAddressCompatibleParametersValidator();
    }
}
