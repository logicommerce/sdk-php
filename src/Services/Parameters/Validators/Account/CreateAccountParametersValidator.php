<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Enums\AccountType;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountInvoicingAddressCompatibleParametersGroup;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountShippingAddressParametersGroup;
use SDK\Services\Parameters\Groups\Account\MasterParametersGroup;

/**
 * This is the create account parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class CreateAccountParametersValidator extends AccountParametersValidator {
    protected function validateMaster($master): ?bool {
        if (is_array($master)) {
            (new MasterParametersValidator())->validate($master);
            return true;
        }
        return $this->validateItemsClass([$master], MasterParametersGroup::class);
    }

    protected function validateType($type): ?bool {
        return $this->validateEnumerateValue($type, AccountType::class);
    }

    protected function validateUseBasketCustomerAsBase($useBasketCustomerAsBase): ?bool {
        return $this->validateBoolean($useBasketCustomerAsBase);
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

    protected function validateGroupPId($groupPId): ?bool {
        return $this->validatePId($groupPId);
    }

    protected function validatePostLogin($postLogin): ?bool {
        return $this->validateBoolean($postLogin);
    }

    protected function validateDescription($description): ?bool {
        return $this->validateString($description, 0);
    }
}
