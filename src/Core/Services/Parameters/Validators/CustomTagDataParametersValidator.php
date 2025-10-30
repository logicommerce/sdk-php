<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the customTag data parameter valiedator validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class CustomTagDataParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['value'];

    protected function validateValue($value): ?bool {
        return is_string($value) ? true : null;
    }

    protected function validateFileName($fileName): ?bool {
        return $this->validateString($fileName);
    }

    protected function validateExtension($extension): ?bool {
        return $this->validateString($extension);
    }
}
