<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\BundleDefinitionsSort;

/**
 * This is the bundle definitions parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class BundleDefinitionsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, BundleDefinitionsSort::class);
    }

}
