<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Enums\CustomerType;

class AccountInvoicingAddressCompatibleParametersValidator extends AccountInvoicingAddressParametersValidator {

    protected function validateCustomerType($customerType): ?bool {
        return $this->validateEnumerateValue($customerType, CustomerType::class);
    }
}
