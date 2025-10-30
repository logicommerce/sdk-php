<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Country;
use SDK\Dtos\Language;
use SDK\Dtos\Currency;

/**
 * This is the country settings class.
 * The countries will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CountrySettings::getLanguages()
 * @see CountrySettings::getCurrencies()
 *
 * @see Country
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class CountrySettings extends Country {
    use ElementTrait;

    protected array $languages = [];

    protected array $currencies = [];

    /**
     * Returns the country languages.
     *
     * @return Language[]
     */
    public function getLanguages(): array {
        return $this->languages;
    }

    protected function setLanguages(array $languages): void {
        $this->languages = $this->setArrayField($languages, Language::class);
    }

    /**
     * Returns the country currencies.
     *
     * @return Currency[]
     */
    public function getCurrencies(): array {
        return $this->currencies;
    }

    protected function setCurrencies(array $currencies): void {
        $this->currencies = $this->setArrayField($currencies, Currency::class);
    }
}
