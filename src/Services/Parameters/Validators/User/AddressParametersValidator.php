<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Services\Parameters\Validators\BaseUserDataParametersValidator;

/**
 * This is the base address parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
abstract class AddressParametersValidator extends BaseUserDataParametersValidator {

    protected function validateAlias($alias): ?bool {
        return $this->validateString($alias, 0);
    }

    protected function validateDefaultAddress($defaultAddress): ?bool {
        return $this->validateBoolean($defaultAddress);
    }
}
