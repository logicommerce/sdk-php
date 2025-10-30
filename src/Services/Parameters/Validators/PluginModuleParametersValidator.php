<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the plugin module parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 * 
 * @uses IdentifiableItemsParametersValidatorTrait
 */
class PluginModuleParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['module'];

    protected function validateModule($module): ?bool {
        return $this->validateString($module, 0);
    }

    protected function validateNavigationHash($navigationHash): ?bool {
        return $this->validateString($navigationHash, 0);
    }
}