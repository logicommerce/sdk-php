<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the base user login validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class LoginParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['username', 'password'];

    protected function validateUsername($username): ?bool {
        return $this->validateString($username);
    }

    protected function validatePassword($password): ?bool {
        return $this->validateString($password);
    }
}
