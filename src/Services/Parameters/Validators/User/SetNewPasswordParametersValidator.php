<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the user set new password parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class SetNewPasswordParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['password', 'hash'];

    protected function validatePassword($password): ?bool {
        return $this->validateString($password);
    }

    protected function validateHash($hash): ?bool {
        return $this->validateString($hash);
    }
}
