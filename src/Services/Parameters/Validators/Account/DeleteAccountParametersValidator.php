<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the delete account parameters validator class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class DeleteAccountParametersValidator extends ParametersValidator {

    protected function validatePassword($password): ?bool {
        return $this->validateString($password, 0);
    }
}
