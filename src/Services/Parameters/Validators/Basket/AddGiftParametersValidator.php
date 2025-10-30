<?php

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the basket add selectable gift parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class AddGiftParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['productId', 'discountSelectableGiftId'];

    protected function validateDiscountSelectableGiftId($discountSelectableGiftId): ?bool {
        return $this->validatePositiveNumeric($discountSelectableGiftId);
    }

    protected function validateProductId($productId): ?bool {
        return $this->validatePositiveNumeric($productId);
    }

    protected function validateOptions($options): ?bool {
        if (!is_array($options)) {
            return null;
        }
        return true;
    }
}
