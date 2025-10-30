<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;
use SDK\Enums\OptionsPriceMode;

/**
 * This is the recommend product parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class RecommendParametersValidator extends ParametersValidator {
    use EmailParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['name', 'email', 'toName', 'toEmail', 'comment', 'items'];

    protected function validateName($name): ?bool {
        return $this->validateString($name, 1, 50);
    }

    protected function validateToName($toName): ?bool {
        return $this->validateString($toName, 1, 50);
    }

    protected function validateEmail($email): ?bool {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return null;
        }
        return $this->validateString($email, 1, 50);
    }

    protected function validateToEmail($toEmail): ?bool {
        return $this->validateEmail($toEmail, 1, 50);
    }

    protected function validateComment($comment): ?bool {
        return $this->validateString($comment, 1, 4000);
    }

    protected function validateItems($items): ?bool {
        if (is_null($this->validateArray($items)) || count($items) === 0) {
            return null;
        }
        return true;
    }

    protected function validateShoppingListId($shoppingListId): ?bool {
        return $this->validatePositiveNumeric($shoppingListId);
    }

    protected function validateOptionsPriceMode($optionsPriceMode): ?bool {
        return $this->validateEnumerateValue($optionsPriceMode, OptionsPriceMode::class);
    }
}
