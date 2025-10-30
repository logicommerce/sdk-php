<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the form model (send custom form data resource) parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class CustomFormSendDataParametersValidator extends ParametersValidator {
    
    protected const REQUIRED_PARAMS = ['url'];

    protected function validateUrl($url): ?bool {
        return $this->validateString($url);
    }
    
    protected function validateFields($fields): ?bool {
        if (is_null($this->validateArray($fields)) || count($fields) === 0) {
            return null;
        }
        return true;
    }

}
