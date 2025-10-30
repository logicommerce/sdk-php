<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Enums\DiscountConditionsToBeMet;
use SDK\Enums\DiscountDiscardConditionedBy;
use SDK\Enums\DiscountSort;

/**
 * This is the product discounts parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class ProductDiscountsParametersValidator extends ParametersValidator {

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
