<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\DiscountConditionsToBeMet;
use SDK\Enums\DiscountDiscardConditionedBy;
use SDK\Enums\DiscountSort;

/**
 * This is the discounts parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class DiscountsParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, PaginableItemsParametersValidatorTrait;

    protected function validateConditionsToBeMet($conditionsToBeMet): ?bool {
        return $this->validateEnumerateValues($conditionsToBeMet, DiscountConditionsToBeMet::class);
    }

    protected function validateDiscardConditionedBy($discardConditionedBy): ?bool {
        return $this->validateEnumerateValues($discardConditionedBy, DiscountDiscardConditionedBy::class);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, DiscountSort::class);
    }
}
