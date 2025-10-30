<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\CustomCompanyRoleTarget;

/**
 * This is the add company roles parameters validator class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class UpdateCompanyRolesParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected function validateName($name): ?bool {
        return $this->validateString($name);
    }

    protected function validateDescription($description): ?bool {
        return $this->validateString($description, 0);
    }

    protected function validateTargetDefault($defaultOne): ?bool {
        return $this->validateBoolean($defaultOne);
    }

    protected function validatePermissions($permissions): ?bool {
        if (is_array($permissions)) {
            (new CompanyRolePermissionsValuesParametersValidator())->validate($permissions);
            return true;
        }
        return $this->validateItemsClass([$permissions], CompanyRolePermissionsValuesParametersValidator::class);
    }
}
