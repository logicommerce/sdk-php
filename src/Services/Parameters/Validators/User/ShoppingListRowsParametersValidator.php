<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;
use SDK\Enums\ShoppingListRowsSort;

/**
 * This is the shopping list parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class ShoppingListRowsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait,
        QParametersValidatorTrait;

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, ShoppingListRowsSort::class);
    }
}
