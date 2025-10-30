<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Enums\AddProductsMode;

/**
 * This is the add product parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class AddProductsParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [ 'mode' ];

    protected function validateMode($mode): ?bool {
        return $this->validateEnumerateValue($mode, AddProductsMode::class);
    }

    protected function validateProducts($products): ?bool {
        if (is_null($this->validateArray($products)) || count($products) === 0) {
            return null;
        }
        return true;
    }
}
