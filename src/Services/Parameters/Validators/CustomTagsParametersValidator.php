<?php

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\CustomTagSort;
use SDK\Enums\CustomTagType;

/**
 * This is the model (get custom tags resource) validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class CustomTagsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['type'];

    protected function validateType($type): ?bool {
        return $this->validateEnumerateValue($type, CustomTagType::class);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, CustomTagSort::class);
    }
}
