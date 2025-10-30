<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\IncludeCompanyStructure;
use SDK\Enums\RegisteredUserSort;

/**
 * This is the registered user move parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class SearchAccountRegisteredUserParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, PaginableItemsParametersValidatorTrait;

    protected function validateUsername($username): ?bool {
        return $this->validateString($username);
    }

    protected function validateFirstName($firstName): ?bool {
        return $this->validateString($firstName, 0);
    }

    protected function validateLastName($lastName): ?bool {
        return $this->validateString($lastName, 0);
    }

    protected function validateIncludeCompanyStructure($includeCompanyStructure): ?bool {
        return $this->validateEnumerateValues($includeCompanyStructure, IncludeCompanyStructure::class);
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

    protected function validateEmail($email): ?bool {
        return $this->validateString($email, 0);
    }
}
