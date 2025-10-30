<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

/**
 * This is the area categories tree parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class AreaCategoriesTreeParametersValidator extends AreaCategoryParametersValidator {

	protected function validateLevels($levels): ?bool {
	    if (is_null($this->validatePositiveNumeric($levels)) || $levels > 6) {
	        return null;
	    }
	    return true;
	}
}
