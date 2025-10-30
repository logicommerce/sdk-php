<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\FromToDateParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\AccountRegisteredUserStatus;
use SDK\Enums\RegisteredUserSort;

/**
 * This is the account model (registered users resource) parameters validator class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class AccountRegisteredUsersParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, PaginableItemsParametersValidatorTrait;

    protected function validateUsername($username): ?bool {
        return $this->validateString($username);
    }

    protected function validateFirstName($firstName): ?bool {
        return $this->validateString($firstName, 0);
    }

    protected function validateEmail($email): ?bool {
        return $this->validateString($email, 0);
    }

    protected function validateLastName($lastName): ?bool {
        return $this->validateString($lastName, 0);
    }

    protected function validateStatusList($statusList): ?bool {
        return $this->validateEnumerateValues($statusList, AccountRegisteredUserStatus::class);
    }

    protected function validateRoleId($roleId): ?bool {
        return $this->validateNumeric($roleId);
    }

    protected function validateMaster($master): ?bool {
        return $this->validateBoolean($master);
    }

    protected function validateAddedFrom($addedFrom): ?bool {
        return $this->validateDate($addedFrom);
    }

    protected function validateAddedTo($addedTo): ?bool {
        return $this->validateDate($addedTo);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, RegisteredUserSort::class);
    }
}
