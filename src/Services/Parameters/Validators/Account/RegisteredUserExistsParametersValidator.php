<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * Validator for RegisteredUserExistsParametersGroup.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class RegisteredUserExistsParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [];

    protected function validateUsername($username): ?bool {
        return $this->validateString($username);
    }
    protected function validateEmail($email): ?bool {
        return $this->validateString($email);
    }
}
