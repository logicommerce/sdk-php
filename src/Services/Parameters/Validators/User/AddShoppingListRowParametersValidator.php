<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\Importance;
use SDK\Services\Parameters\Groups\User\AddShoppingListRowReferenceParametersGroup;

/**
 * This is the add shopping list row parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class AddShoppingListRowParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected function validateReference($reference): ?bool {
        if (is_array($reference)) {
            (new AddShoppingListRowReferenceParametersValidator())->validate($reference);
            return true;
        }
        return $this->validateItemsClass([$reference], AddShoppingListRowReferenceParametersGroup::class);
    }

    protected function validateComment($comment): ?bool {
        return $this->validateString($comment, 0, 255);
    }

    protected function validatePriority($priority): ?bool {
        return $this->validatePositiveNumeric($priority);
    }

    protected function validateQuantity($quantity): ?bool {
        return $this->validatePositiveNumeric($quantity);
    }

    protected function validateShoppingListId($shoppingListId): ?bool {
        return $this->validateId($shoppingListId);
    }

    protected function validateImportance($importance): ?bool {
        return $this->validateEnumerateValue($importance, Importance::class);
    }
}
