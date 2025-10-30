<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Settings;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the countries links parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Settings
 */
class CountriesLinksParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [];
    protected const REQUIRED_VINCULATED_PARAMS = ['onlyMyLevel' => 'host'];

    protected function validateLanguageCode($languageCode): ?bool {
        return $this->validateString($languageCode);
    }

    protected function validateHost($host): ?bool {
        return $this->validateString($host);
    }

    protected function validateAllCountries($allCountries): ?bool {
        return $this->validateBoolean($allCountries);
    }

    protected function validateOnlyMyLevel($onlyMyLevel): ?bool {
        return $this->validateBoolean($onlyMyLevel);
    }
}
