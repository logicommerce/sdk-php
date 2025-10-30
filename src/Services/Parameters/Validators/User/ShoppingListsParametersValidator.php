<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;
use SDK\Enums\ShoppingListsSort;

/**
 * This is the shopping list parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class ShoppingListsParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait,
        QParametersValidatorTrait;
    
    protected function validateDefaultOne($defaultOne): ?bool {
        return $this->validateBoolean($defaultOne);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, ShoppingListsSort::class);
    }

}
