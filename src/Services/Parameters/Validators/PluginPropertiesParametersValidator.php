<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the plugin properties parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class PluginPropertiesParametersValidator extends ParametersValidator {
    
    protected const REQUIRED_PARAMS = ['module'];

    protected function validateModule($module): ?bool {
        return $this->validateString($module);
    }
}
