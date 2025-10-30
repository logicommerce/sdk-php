<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\OptionsPriceMode;

/**
 * This is the related items validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class RelatedItemsParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected function validatePosition($position): ?bool {
        return $this->validateNumeric($position);
    }

    protected function validatePositionList($positionList): ?bool {
        return $this->validateNumericList($positionList);
    }

    protected function validateLimit($limit): ?bool {
        if (is_null($this->validatePositiveNumeric($limit)) || $limit > 50) {
            return null;
        }
        return true;
    }

    protected function validateCategoryProducts($categoryProducts): ?bool {
        return $this->validateBoolean($categoryProducts);
    }

    protected function validateOptionsPriceMode($optionsPriceMode): ?bool {
        return $this->validateEnumerateValue($optionsPriceMode, OptionsPriceMode::class);
    }

    protected function validateOffset($offset): ?bool {
        return $this->validateNumeric($offset);
    }
}
