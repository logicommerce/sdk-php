<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Enums\PluginConnectorType;

/**
 * This is the plugin connector type parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 * 
 * @uses IdentifiableItemsParametersValidatorTrait
 */
class PluginConnectorTypeParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['type'];

    protected function validateType($type): ?bool {
        return $this->validateEnumerateValue($type, PluginConnectorType::class);
    }

    protected function validateNavigationHash($navigationHash): ?bool {
        return $this->validateString($navigationHash, 0);
    }

    protected function validateCountryCode($countryCode): ?bool {
        return $this->validateString($countryCode, 0);
    }
}
