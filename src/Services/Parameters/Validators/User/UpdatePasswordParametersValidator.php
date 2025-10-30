<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the user update password parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class UpdatePasswordParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['password', 'newPassword'];

    protected function validatePassword($password): ?bool {
        return $this->validateString($password);
    }

    protected function validateNewPassword($newPassword): ?bool {
        return $this->validateString($newPassword);
    }
}
