<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Services\Parameters\Validators\BaseUserDataParametersValidator;

/**
 * This is the base address parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
abstract class AccountAddressParametersValidator extends BaseUserDataParametersValidator {

    protected function validateAlias($alias): ?bool {
        return $this->validateString($alias, 0);
    }

    protected function validateDefaultOne($defaultOne): ?bool {
        return $this->validateBoolean($defaultOne);
    }

    protected function validatePId($pId): ?bool {
        return $this->validateString($pId, 0);
    }
}
