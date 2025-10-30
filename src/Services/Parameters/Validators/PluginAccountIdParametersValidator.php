<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the plugin account id parameter validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class PluginAccountIdParametersValidator extends ParametersValidator {
    
    protected const REQUIRED_PARAMS = ['pluginAccountId'];

    protected function validatePluginAccountId($pluginAccountId): ?bool {
        return $this->validatePositiveNumeric($pluginAccountId);
    }
}
