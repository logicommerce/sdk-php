<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\DiscountSelectableGiftsSort;
use SDK\Enums\StockType;

/**
 * This is the discounts parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class DiscountSelectableGiftsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;

    protected function validateStockType($stockType): ?bool {
        return $this->validateEnumerateValues($stockType, StockType::class);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, DiscountSelectableGiftsSort::class);
    }
}
