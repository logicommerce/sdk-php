<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\CompanyRolesSort;
use SDK\Enums\CustomCompanyRoleTarget;
use SDK\Enums\StructureFilter;

/**
 * This is the update account parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class CompanyRolesParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;

    protected function validateName($name): ?bool {
        return $this->validateString($name, 0);
    }

    protected function validateTarget($target): ?bool {
        return $this->validateEnumerateValue($target, CustomCompanyRoleTarget::class);
    }

    protected function validateTargetDefault($defaultOne): ?bool {
        return $this->validateBoolean($defaultOne);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, CompanyRolesSort::class);
    }
}
