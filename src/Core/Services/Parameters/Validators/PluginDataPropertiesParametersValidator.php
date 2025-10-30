<?php

namespace SDK\Core\Services\Parameters\Validators;

/**
 * This is the plugin data parameters validation class.
 *
 * @package SDK\Core\Services\Parameters\Validators
 */
class PluginDataParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['action'];

    protected function validateAction($action): ?bool {
        return $this->validateString($action);
    }

    protected function validateData($data): ?bool {
        return $this->validateArray($data);
    }

}
