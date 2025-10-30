<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the product option value parameter valiedator validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class ProductOptionValueParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [ 'value' ];

    protected function validateValue($value): ?bool {
        return $this->validateString($value, 0);
    }

    protected function validateFileName($fileName): ?bool {
        return $this->validateString($fileName, 0);
    }

    protected function validateExtension($extension): ?bool {
        return $this->validateString($extension, 0);
    }
}
