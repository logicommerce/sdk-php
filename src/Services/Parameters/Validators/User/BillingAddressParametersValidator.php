<?php

namespace SDK\Services\Parameters\Validators\User;

use SDK\Enums\UserType;

/**
 * This is the billing address parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class BillingAddressParametersValidator extends AddressParametersValidator {

    protected function validateUserType($userType): ?bool {
        return $this->validateEnumerateValue($userType, UserType::class);
    }

    protected function validateRe($re): ?bool {
        return $this->validateBoolean($re);
    }

    protected function validateTax($tax): ?bool {
        return $this->validateBoolean($tax);
    }
}
