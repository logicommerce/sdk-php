<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the country code validator trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait CountryCodeParametersValidatorTrait {

    protected function validateCountryCode($countryCode): ?bool {
        return $this->validateString($countryCode);
    }
}
