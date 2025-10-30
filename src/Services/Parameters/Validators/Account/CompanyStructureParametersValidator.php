<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\StructureFilter;

/**
 * This is the update account parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class CompanyStructureParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;

    protected function validateLevels($levels): ?bool {
        if (is_null($this->validatePositiveNumeric($levels)) || $levels > 6) {
            return null;
        }
        return true;
    }

    protected function validateStructureFilter($structureFilter): ?bool {
        return $this->validateEnumerateValue($structureFilter, StructureFilter::class);
    }
}
