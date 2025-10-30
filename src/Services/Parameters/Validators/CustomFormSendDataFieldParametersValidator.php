<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the form model (send custom form data field resource) parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class CustomFormSendDataFieldParametersValidator extends ParametersValidator {

    protected function validateName($name): ?bool {
        return $this->validateString($name);
    }

    protected function validateValue($value): ?bool {
        return $this->validateString($value);
    }

}
