<?php

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the basket Massive Product Row Pinned Parameters Validator class, which validates the parameters for the pinning of multiple product rows in the cart.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class MassiveProductRowPinnedParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [];

    protected function validateItems($items): ?bool {
        if (!is_array($items) || empty($items)) {
            return null;
        }
        return true;
    }
}
