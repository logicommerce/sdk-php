<?php

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\AddProductsMode;

/**
 * This is the basket add product parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class AddProductParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, ProductParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'id', 'quantity' ];

    protected function validateMode($mode): ?bool {
        return $this->validateEnumerateValue($mode, AddProductsMode::class);
    }
}
