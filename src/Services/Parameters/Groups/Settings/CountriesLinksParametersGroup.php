<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Settings;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Settings\CountriesLinksParametersValidator;

/**
 * This is the settings model (countries links resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Settings
 */
class CountriesLinksParametersGroup extends ParametersGroup {

    protected string $languageCode;

    protected string $host;

    protected bool $allCountries;

    protected bool $onlyMyLevel;

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
     * Sets the language ISO code parameter for this parameters group.
     *
     * @param string $host
     *
     * @return void
     */
    public function setHost(string $host): void {
        $this->host = $host;
    }

    /**
     * A boolean that defines whether the link to all store versions should be displayed, or only for specific versions of the introduced host. 
     * This only applies when the introduced host belongs to a specific version per country or group of countries.
     *
     * @param bool $onlyMyLevel
     *
     * @return void
     */
    public function setOnlyMyLevel(bool $onlyMyLevel): void {
        $this->onlyMyLevel = $onlyMyLevel;
    }

    /**
     * A boolean that allows displaying all countries without grouping. Useful when there is only a level 1 domain that shares URLs across countries.
     *
     * @param bool $allCountries
     *
     * @return void
     */
    public function setAllCountries(bool $allCountries): void {
        $this->allCountries = $allCountries;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CountriesLinksParametersValidator {
        return new CountriesLinksParametersValidator();
    }
}
