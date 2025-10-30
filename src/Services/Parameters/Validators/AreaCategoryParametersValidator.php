<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\OnlyActiveParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\AreaCategorySort;

/**
 * This is the area category parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class AreaCategoryParametersValidator extends ParametersValidator {
    use OnlyActiveParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait;

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, AreaCategorySort::class);
    }
}
