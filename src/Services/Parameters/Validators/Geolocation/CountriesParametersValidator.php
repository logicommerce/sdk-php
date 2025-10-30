<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Geolocation;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CountryCodeParametersValidatorTrait;

/**
 * This is the country parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Geolocation
 */
class CountriesParametersValidator extends ParametersValidator {
    use CountryCodeParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [];

    protected function validateLanguageCode($languageCode): ?bool {
        return $this->validateString($languageCode);
    }
}
