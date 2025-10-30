<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\AccountRegisteredUserStatus;

/**
 * This is the account registered user create parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class UpdateAccountRegisteredUsersParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected function validateAccountId($accountId): ?bool {
        return $this->validateId($accountId);
    }

    protected function validateMaster($master): ?bool {
        return $this->validateBoolean($master);
    }

    protected function validateStatus($status): ?bool {
        return $this->validateEnumerateValues($status, AccountRegisteredUserStatus::class);
    }

    protected function validateAccountAlias($accountAlias): ?bool {
        return $this->validateString($accountAlias, 0);
    }

    protected function validateRoleId($roleId): ?bool {
        return $this->validateNumeric($roleId);
    }

    protected function validateJob($job): ?bool {
        return $this->validateString($job, 0);
    }

    protected function validateUseShippingAddress($useShippingAddress): ?bool {
        return $this->validateBoolean($useShippingAddress);
    }
}
