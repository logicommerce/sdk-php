<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Enums\FormType;

/**
 * This is the data validation parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class DataValidationParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [ 'type' ];

    protected function validateType($type): ?bool {
        return $this->validateEnumerateValue($type, FormType::class);
    }
}
