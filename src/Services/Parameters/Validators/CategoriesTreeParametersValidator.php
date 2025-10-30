<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\OnlyActiveParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;
use SDK\Enums\CategoriesTreeSort;

/**
 * This is the categories tree parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class CategoriesTreeParametersValidator extends ParametersValidator {
    use OnlyActiveParametersValidatorTrait, PaginableItemsParametersValidatorTrait, IdentifiableItemsParametersValidatorTrait, QParametersValidatorTrait;

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, CategoriesTreeSort::class);
    }

    protected function validateLevels($levels): ?bool {
	    if (is_null($this->validatePositiveNumeric($levels)) || $levels > 6) {
	        return null;
	    }
	    return true;
	}
}
