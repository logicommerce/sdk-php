<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Services\Parameters\Groups\Account\RegisteredUserParametersGroup;

/**
 * This is the company divisions master parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class CompanyDivisionMasterParametersValidator extends ParametersValidator {
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

    protected function validateAlias($alias): ?bool {
        return $this->validateString($alias, 0);
    }

    protected function validateUseShippingAddress($useShippingAddress): ?bool {
        return $this->validateBoolean($useShippingAddress);
    }

    protected function validateDefaultCurrency($defaultCurrency): ?bool {
        return $this->validateString($defaultCurrency);
    }

    protected function validateDefaultLanguange($defaultLanguange): ?bool {
        return $this->validateString($defaultLanguange);
    }

    protected function validateJob($job): ?bool {
        return $this->validateString($job);
    }

    protected function validateRoleId($roleId): ?bool {
        return $this->validateNumeric($roleId);
    }
}
