<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Geolocation;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Geolocation\CountriesParametersValidator;

/**
 * This is the geolocation model (countries resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Geolocation
 */
class CountriesParametersGroup extends ParametersGroup {

    protected string $languageCode;

    protected string $countryCode;

    /**
     * Sets the language ISO code parameter for this parameters group.
     *
     * @param string $languageCode
     *
     * @return void
     */
    public function setLanguageCode(string $languageCode): void {
        $this->languageCode = $languageCode;
    }

    /**
     * Sets the country ISO code parameter for this parameters group.
     *
     * @param string $countryCode
     *
     * @return void
     */
    public function setCountryCode(string $countryCode): void {
        $this->countryCode = $countryCode;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CountriesParametersValidator {
        return new CountriesParametersValidator();
    }
}
