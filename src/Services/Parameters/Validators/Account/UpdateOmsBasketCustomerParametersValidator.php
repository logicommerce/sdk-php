<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Enums\AccountType;
use SDK\Enums\Gender;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountInvoicingAddressCompatibleParametersGroup;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountShippingAddressParametersGroup;

class UpdateOmsBasketCustomerParametersValidator extends AccountParametersValidator {
    protected function validateType($type): ?bool {
        return $this->validateEnumerateValue($type, AccountType::class);
    }

    protected function validateGender($gender): ?bool {
        return $this->validateEnumerateValue($gender, Gender::class);
    }

    protected function validateBirthday($birthday): ?bool {
        return $this->validateDate($birthday);
    }

    protected function validateInvoicingAddress($invoicingAddress): ?bool {
        if (is_array($invoicingAddress)) {
            (new AccountInvoicingAddressCompatibleParametersValidator())->validate($invoicingAddress);
            return true;
        }
        return $this->validateItemsClass([$invoicingAddress], AccountInvoicingAddressCompatibleParametersGroup::class);
    }

    protected function validateShippingAddress($shippingAddress): ?bool {
        if (is_array($shippingAddress)) {
            (new AccountShippingAddressParametersValidator())->validate($shippingAddress);
            return true;
        }
        return $this->validateItemsClass([$shippingAddress], AccountShippingAddressParametersGroup::class);
    }

    protected function validateCustomerName($customerName): ?bool {
        return $this->validateString($customerName, 0);
    }

    protected function validateUseShippingAddress($useShippingAddress): ?bool {
        return $this->validateBoolean($useShippingAddress);
    }

    protected function validateSelectedAccountInvoicingAddressId($selectedAccountInvoicingAddressId): ?bool {
        return $this->validateId($selectedAccountInvoicingAddressId);
    }

    protected function validateSelectedAccountShippingAddressId($selectedAccountShippingAddressId): ?bool {
        return $this->validateId($selectedAccountShippingAddressId);
    }
}
