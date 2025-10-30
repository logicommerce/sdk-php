<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Services\Parameters\Groups\Account\RegisteredUserParametersGroup;

/**
 * This is the master update parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class MasterUpdateParametersValidator extends MasterParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;
    protected function validateRoleId($roleId): ?bool {
        return $this->validateNumeric($roleId);
    }
}
