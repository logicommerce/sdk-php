<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the bundle definitions groupings parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class BundleDefinitionsGroupingsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;

    protected function validateBundleDefinitionId($bundleDefinitionId): ?bool {
        return $this->validatePositiveNumeric($bundleDefinitionId);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, BundleDefinitionsGroupingsSort::class);
    }

}
