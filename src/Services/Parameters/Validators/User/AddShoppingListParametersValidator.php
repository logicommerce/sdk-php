<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the add shopping list parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class AddShoppingListParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['name'];

    protected function validateName($name): ?bool {
        return $this->validateString($name);
    }

    protected function validateDescription($description): ?bool {
        return $this->validateString($description, 0);
    }

    protected function validateKeepPurchasedItems($keepPurchasedItems): ?bool {
        return $this->validateBoolean($keepPurchasedItems);
    }

    protected function validateDefaultOne($defaultOne): ?bool {
        $valid = $this->validateBoolean($defaultOne);
        if ($valid) {
            $valid = $defaultOne ?: null;
        }
        return $valid;
    }

    protected function validatePriority($priority): ?bool {
        return $this->validateNumeric($priority);
    }
}
