<?php

declare(strict_types=1);

namespace SDK;

use SDK\Services\LmsService;
use SDK\Core\Application as CoreApplication;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Exceptions\ApplicationException;
use SDK\Core\Resources\Url;
use SDK\Dtos\Licenses;
use SDK\Dtos\Settings\EcommerceSettings;
use SDK\Enums\PluginConnectorType;
use SDK\Services\Parameters\Groups\PluginConnectorTypeParametersGroup;
use SDK\Services\Parameters\Groups\Settings\CountriesLinksParametersGroup;
use SDK\Services\PluginService;
use SDK\Services\SettingsService;

/**
 * This is the Application class in the SDK package.
 * All setting/getting operations
 * are done through this class.
 *
 * @see Application::getEcommerceSettings()
 * @see Application::getCountriesSettings()
 * @see Application::getCurrenciesSettings()
 * @see Application::getLanguagesSettings()
 * @see Application::getLicenses()
 *
 * @see CoreApplication
 *
 * @package SDK
 */
final class Application extends CoreApplication {

    protected function getSettings(): EcommerceSettings {
        return SettingsService::getInstance()->getSettings();
    }

    /**
     *
     * @throws ApplicationException|NULL
     */
    protected function setSettings(): void {
        $settings = $this->getSettings();
        if (!$this->validSettings($settings)) {
            throw new ApplicationException(
                'The Application was unable to retrieve the Settings from the API',
                ApplicationException::COULD_NOT_RETRIEVE_SETTINGS
            );
        }
        $this->set(self::ECOMMERCE, $settings);
    }

    private function validSettings(EcommerceSettings $settings): bool {
        return !(is_null($settings)
            || !is_null($settings->getError())
            || is_null($settings->getGeneralSettings())
            || is_null($settings->getCatalogSettings())
            || is_null($settings->getGeoIPSettings())
            || is_null($settings->getLegalSettings())
            || is_null($settings->getOrdersSettings())
            || is_null($settings->getSeoSettings())
            || is_null($settings->getSitemapSettings())
            || is_null($settings->getStockSettings())
            || is_null($settings->getUserAccountsSettings())
            || is_null($settings->getTaxSettings()))
            || is_null($settings->getAccountsSettings())
            || is_null($settings->getRegisteredUsersSettings())
            || is_null($settings->getAccountRegisteredUsersSettings());
    }

    /**
     * Returns the ecommerce settings object.
     *
     * @return EcommerceSettings|NULL
     */
    public function getEcommerceSettings(): ?EcommerceSettings {
        return $this->get(self::ECOMMERCE);
    }

    /**
     * Returns the ecommerce settings object.
     *
     * @return ElementCollection|NULL
     */
    public function getEcommercePlugins(): ?ElementCollection {
        return $this->get(self::PLUGINS);
    }

    protected function getPlugins(string $navigationHash): ElementCollection {
        /** @var \SDK\Services\PluginService  */
        $pluginService = PluginService::getInstance();
        $params = new PluginConnectorTypeParametersGroup();
        $params->setType(PluginConnectorType::NONE);
        $params->setNavigationHash($navigationHash);
        return $pluginService->getPlugins($params);
    }

    /**
     *
     * @throws ApplicationException|NULL
     */
    public function setPlugins(string $navigationHash): void {
        $this->set(self::PLUGINS, $this->getPlugins($navigationHash));
    }

    /**
     * Returns the ecommerce settings countries.
     *
     * @param string $languageCode
     *            Optional. String that sets the language for the countries to be returned.
     * @param string $countryCode
     *            Optional. String that sets the language for the countries to be returned.
     *
     * @return ElementCollection|NULL
     */
    public function getCountriesSettings(string $languageCode = null, string $countryCode = null): ?ElementCollection {
        $key = 'countries';
        if (!is_null($languageCode)) {
            $key .= '_' . $languageCode;
        }
        if (!is_null($countryCode)) {
            $key .= '_' . $countryCode;
        }
        return $this->getSetting($key, fn() => SettingsService::getInstance()->getCountries($languageCode, $countryCode));
    }

    /**
     * Returns the ecommerce settings countries.
     *
     * @param ?CountriesLinksParametersGroup $countriesLinksParametersGroup
     *
     * @return ElementCollection|NULL
     */
    public function getCountriesLinks(?CountriesLinksParametersGroup $countriesLinksParametersGroup = null): ?ElementCollection {
        $key = 'countriesLinks';
        if (!is_null($countriesLinksParametersGroup)) {
            $key .= '_' . Url::encodeParams($countriesLinksParametersGroup->toArray());
        }
        return $this->getSetting($key, fn() => SettingsService::getInstance()->getCountriesLinks($countriesLinksParametersGroup));
    }

    /**
     * Returns the ecommerce settings currencies.
     *
     * @return ElementCollection|NULL
     */
    public function getCurrenciesSettings(string $countryCode = null): ?ElementCollection {
        $country = [];
        $settingsCountryCurrencies = $this->getSetting('currencies', fn() => SettingsService::getInstance()->getCurrencies());
        if (method_exists($settingsCountryCurrencies, 'getCountries')) {
            $country = array_filter($settingsCountryCurrencies->getCountries(), fn($country) => $country->getCountryCode() === $countryCode);
        }
        if (count($country) === 1) {
            $countryCurrencies = array_values(array_filter($settingsCountryCurrencies->getItems(), fn($currency) => in_array($currency->getCode(), array_pop($country)->getCurrencyCodes())));
        } else {
            $countryCurrencies = $settingsCountryCurrencies->getItems();
        }
        $currencies = new ElementCollection([
            'items' => $countryCurrencies
        ]);
        return $currencies;
    }

    /**
     * Returns the ecommerce settings Languages.
     *
     * @return ElementCollection|NULL
     */
    public function getLanguagesSettings(): ?ElementCollection {
        return $this->getSetting('languages', fn() => SettingsService::getInstance()->getLanguages());
    }

    /**
     * Returns the ecommerce settings object.
     *
     * @return Licenses|NULL
     */
    public function getEcommerceLicenses(): ?Licenses {
        return $this->get(self::LICENSES);
    }

    protected function getLicenses(): Licenses {
        return LmsService::getInstance()->getLicenses();
    }

    /**
     *
     * @throws ApplicationException|NULL
     */
    protected function setLicenses(): void {
        $this->set(self::LICENSES, $this->getLicenses());
    }

    private function getSetting(string $key, callable $method): ElementCollection {
        $setting = $this->get($key);
        if (is_null($setting)) {
            $setting = $method();
            $this->set($key, $setting);
        }
        return $setting;
    }
}
