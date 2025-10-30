<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Services\Parameters\Groups\Account\RegisteredUserParametersGroup;

/**
 * This is the account registered user create parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class CreateAccountRegisteredUserParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected function validateRegisteredUserId($registeredUserId): ?bool {
        return $this->validateId($registeredUserId);
    }

    protected function validateRegisteredUser($registeredUser): ?bool {
        if (is_array($registeredUser)) {
            (new RegisteredUserParametersValidator())->validate($registeredUser);
            return true;
        }
        return $this->validateItemsClass([$registeredUser], RegisteredUserParametersGroup::class);
    }

    protected function validateJob($job): ?bool {
        return $this->validateString($job, 0);
    }

    protected function validateRoleId($roleId): ?bool {
        return $this->validateNumeric($roleId);
    }
}
