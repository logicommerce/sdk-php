<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Application;
use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\CacheTrait;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Currency;
use SDK\Dtos\Language;
use SDK\Dtos\Settings\AccountRegisteredUsersSettings;
use SDK\Dtos\Settings\AccountsSettings;
use SDK\Dtos\Settings\BasketStockLockingSettings;
use SDK\Dtos\Settings\BlogSettings;
use SDK\Dtos\Settings\CatalogSettings;
use SDK\Dtos\Settings\CountryLink;
use SDK\Dtos\Settings\CountrySettings;
use SDK\Dtos\Settings\EcommerceSettings;
use SDK\Dtos\Settings\GeneralSettings;
use SDK\Dtos\Settings\GeoIPSettings;
use SDK\Dtos\Settings\LegalSettings;
use SDK\Dtos\Settings\OrdersSettings;
use SDK\Dtos\Settings\RegisteredUsersSettings;
use SDK\Dtos\Settings\SeoSettings;
use SDK\Dtos\Settings\SitemapSettings;
use SDK\Dtos\Settings\StockSettings;
use SDK\Dtos\Settings\TaxSettings;
use SDK\Dtos\Settings\UserAccountsSettings;
use SDK\Dtos\Settings\Version;
use SDK\Services\Parameters\Groups\Blog\BlogSettingsParametersGroup;
use SDK\Services\Parameters\Groups\Geolocation\CountriesParametersGroup;
use SDK\Services\Parameters\Groups\Settings\CountriesLinksParametersGroup;

/**
 * This is the settings service class.
 * This class will retrieve the settings from LogiCommerce API and transform them to objects.
 * All the needed settings operations previous to Framework must be done here.
 *
 * @see SettingsService::getSettings()
 * @see SettingsService::getAccountRegisteredUsersSettings()
 * @see SettingsService::getBasketStockLockingSettings()
 * @see SettingsService::getBlogSettings()
 * @see SettingsService::getCatalogSettings()
 * @see SettingsService::getGeneralSettings()
 * @see SettingsService::getGeoIpSettings()
 * @see SettingsService::getLegalSettings()
 * @see SettingsService::getOrdersSettings()
 * @see SettingsService::getSeoSettings()
 * @see SettingsService::getSitemapSettings()
 * @see SettingsService::getStockSettings()
 * @see SettingsService::getTaxSettings()
 * @see SettingsService::getUserAccountsSettings()
 * @see SettingsService::getAccountsSettings()
 * @see SettingsService::getRegisteredUsersSettings()
 * @see SettingsService::getCountries()
 * @see SettingsService::getCurrencies()
 * @see SettingsService::getLanguages()
 * @see SettingsService::getVersion()
 *
 * @see AccountsSettings
 * @see AccountRegisteredUsersSettings
 * @see BasketStockLockingSettings
 * @see BlogSettings
 * @see CatalogSettings
 * @see CountrySettings
 * @see Currency
 * @see EcommerceSettings
 * @see GeneralSettings
 * @see GeoIPSettings
 * @see Language
 * @see LegalSettings
 * @see OrdersSettings
 * @see RegisteredUsersSettings
 * @see SeoSettings
 * @see SitemapSettings
 * @see StockSettings
 * @see TaxSettings
 * @see UserAccountsSettings
 *
 * @see SettingsService::addGetBasketStockLockingSettings()
 * @see SettingsService::addGetBlogSettings()
 * @see SettingsService::addGetCountries()
 * @see SettingsService::addGetCurrencies()
 * @see SettingsService::addGetLanguages()
 * @see SettingsService::addGetVersion()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class SettingsService extends Service {
    use ServiceTrait, CacheTrait;

    private const REGISTRY_KEY = Registry::SETTINGS_MODEL;

    private function getCacheTtl(): int {
        return defined('LIFE_TIME_CACHE_APPLICATION') ? LIFE_TIME_CACHE_APPLICATION : 5 * 60;
    }

    /**
     * Returns all the website settings
     *
     * @return EcommerceSettings
     */
    public function getSettings(): EcommerceSettings {
        $settings = Application::getInstance()->getEcommerceSettings();
        if (is_null($settings)) {
            $settings = $this->getSettingsElement(EcommerceSettings::class);
        }
        return $settings;
    }

    /**
     * Returns the website catalog settings
     *
     * @return CatalogSettings
     */
    public function getCatalogSettings(): CatalogSettings {
        return $this->getSettingsElement(CatalogSettings::class, 'catalog');
    }

    /**
     * Returns the website legal settings
     *
     * @return LegalSettings
     */
    public function getLegalSettings(): LegalSettings {
        return $this->getSettingsElement(LegalSettings::class, 'legal');
    }

    /**
     * Returns the website GeoIP settings
     *
     * @return GeoIPSettings
     */
    public function getGeoIpSettings(): GeoIPSettings {
        return $this->getSettingsElement(GeoIPSettings::class, 'geoIp');
    }

    /**
     * Returns the website general settings
     *
     * @return GeneralSettings
     */
    public function getGeneralSettings(): GeneralSettings {
        return $this->getSettingsElement(GeneralSettings::class, 'general');
    }

    /**
     * Returns the website orders settings
     *
     * @return OrdersSettings
     */
    public function getOrdersSettings(): OrdersSettings {
        return $this->getSettingsElement(OrdersSettings::class, 'orders');
    }

    /**
     * Returns the website seo settings
     *
     * @return SeoSettings
     */
    public function getSeoSettings(): SeoSettings {
        return $this->getSettingsElement(SeoSettings::class, 'seo');
    }

    /**
     * Returns the website sitemap settings
     *
     * @return SitemapSettings
     */
    public function getSitemapSettings(): SitemapSettings {
        return $this->getSettingsElement(SitemapSettings::class, 'sitemap');
    }

    /**
     * Returns the website user accounts settings
     *
     * @return UserAccountsSettings
     * @deprecated
     */
    public function getUserAccountsSettings(): UserAccountsSettings {
        return $this->getSettingsElement(UserAccountsSettings::class, 'userAccounts');
    }

    /**
     * Returns the website tax settings
     *
     * @return TaxSettings
     */
    public function getTaxSettings(): TaxSettings {
        return $this->getSettingsElement(TaxSettings::class, 'tax');
    }

    /**
     * Returns the website stock settings
     *
     * @return StockSettings
     */
    public function getStockSettings(): StockSettings {
        return $this->getSettingsElement(StockSettings::class, 'stock');
    }

    /**
     * Returns the website basket Stock Locking settings
     *
     * @return BasketStockLockingSettings
     */
    public function getBasketStockLockingSettings(): BasketStockLockingSettings {
        return $this->getSettingsElement(BasketStockLockingSettings::class, 'basketStockLocking');
    }

    /**
     * Returns the website accounts settings
     *
     * @return AccountsSettings
     */
    public function getAccountsSettings(): AccountsSettings {
        return $this->getSettingsElement(AccountsSettings::class, 'accounts');
    }

    /**
     * Returns the website registered users settings
     *
     * @return RegisteredUsersSettings
     */
    public function getRegisteredUsersSettings(): RegisteredUsersSettings {
        return $this->getSettingsElement(RegisteredUsersSettings::class, 'registeredUsers');
    }

    /**
     * Returns the website account registered users settings
     *
     * @return AccountRegisteredUsersSettings
     */
    public function getAccountRegisteredUsersSettings(): AccountRegisteredUsersSettings {
        return $this->getSettingsElement(AccountRegisteredUsersSettings::class, 'accountRegisteredUsers');
    }

    /**
     * Returns the website blog settings
     *
     * @return BlogSettings
     */
    public function getBlogSettings(string $languageCode = null): BlogSettings {
        return $this->getSettingsElement(BlogSettings::class, 'blog', $this->getBlogSettingsParams($languageCode));
    }

    private function getBlogSettingsParams(?string $languageCode): ?BlogSettingsParametersGroup {
        if (is_null($languageCode)) {
            return null;
        }
        $params = new BlogSettingsParametersGroup();
        $params->setLanguageCode($languageCode);
        return $params;
    }

    /**
     * Returns the website configured and available countries
     *
     * @param string $languageCode
     *            Optional. String that sets the language for the countries to be returned.
     * @param string $countryCode
     *            Optional. String that sets the language for the countries to be returned.
     * 
     * @return ElementCollection|NULL
     */
    public function getCountries(string $languageCode = null, string $countryCode = null): ?ElementCollection {
        return $this->getSettingsElements(CountrySettings::class, 'countries', $this->getCountriesParams($languageCode, $countryCode));
    }

    private function getCountriesParams(?string $languageCode, ?string $countryCode): ?CountriesParametersGroup {
        if (is_null($languageCode) && is_null($countryCode)) {
            return null;
        }
        $params = new CountriesParametersGroup();
        if (!is_null($languageCode)) {
            $params->setLanguageCode($languageCode);
        }
        if (!is_null($countryCode)) {
            $params->setCountryCode($countryCode);
        }
        return $params;
    }

    /**
     * Returns the website configured and available countries
     *
     * @param ?CountriesLinksParametersGroup $countriesLinksParametersGroup
     * 
     * @return ElementCollection|NULL
     */
    public function getCountriesLinks(?CountriesLinksParametersGroup $countriesLinksParametersGroup = null): ?ElementCollection {
        return $this->getSettingsElements(CountryLink::class, 'countries/links', $countriesLinksParametersGroup);
    }

    /**
     * Returns the website configured and available currencies
     *
     * @return ElementCollection|NULL
     */
    public function getCurrencies(): ?ElementCollection {
        return $this->getSettingsElements(Currency::class, 'currencies');
    }

    /**
     * Returns the website configured and available languages
     *
     * @return ElementCollection|NULL
     */
    public function getLanguages(): ?ElementCollection {
        return $this->getSettingsElements(Language::class, 'languages');
    }

    private function getSettingsElement(string $class, string $resource = '', ParametersGroup $params = null): ?Element {
        $value = $this->getValueByResource($resource, $params);
        if (!is_null($value)) {
            return $value;
        }
        return $this->getResourceElement($class, Resource::SETTINGS . '/' . $resource, $params);
    }

    private function getValueByResource(string $resource, ParametersGroup $params = null) {
        $settings = Application::getInstance()->getEcommerceSettings();
        if (!is_null($settings) && method_exists($settings, 'get' . $resource . 'Settings')) {
            return $settings->{'get' . $resource . 'Settings'}($params);
        }
        return null;
    }

    private function getSettingsElements(string $class, string $resource = '', ParametersGroup $params = null): ?ElementCollection {
        return $this->getElements($class, Resource::SETTINGS . '/' . $resource, $params);
    }

    /**
     * Add the request to get the website basket Stock Locking settings
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @deprecated 
     * @return void
     */
    public function addGetBasketStockLockingSettings(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::SETTINGS_BASKET_STOCK_LOCKING)
                ->build()
        );
    }


    /**
     * Add the request to get the website blog settings
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $languageCode
     *            Optional. String that sets the language for the blog settings to be returned.
     *
     * @return void
     */
    public function addGetBlogSettings(BatchRequests $batchRequests, string $batchName, string $languageCode = null): void {
        $batchRequests->addRequest((new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::SETTINGS_BLOG)->urlParams($this->getBlogSettingsParams($languageCode))
                ->build()
        );
    }

    /**
     * Add the request to get the website configured and available countries
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $languageCode
     *            Optional. String that sets the language for the countries to be returned.
     * @param string $countryCode
     *            Optional. String that sets the country for the countries to be returned.

     *
     * @return void
     */
    public function addGetCountries(BatchRequests $batchRequests, string $batchName, string $languageCode = null, string $countryCode = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::SETTINGS_COUNTRIES)->urlParams($this->getCountriesParams($languageCode, $countryCode))
                ->build()
        );
    }

    /**
     * Add the request to gets the list of countries enabled for sale along with the presentation layer paths of the versions of each of the active languages in them. 
     * The output includes the country code in ISO 3166-2 format, required to specify the country in many of the API resources. If languageCode is provided, the output shows the name of each country in the specified language.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param ?CountriesLinksParametersGroup $countriesLinksParametersGroup
     *
     * @return void
     */
    public function addGetCountriesLinks(BatchRequests $batchRequests, string $batchName, ?CountriesLinksParametersGroup $countriesLinksParametersGroup = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::SETTINGS_COUNTRIES_LINKS)->urlParams($countriesLinksParametersGroup)
                ->build()
        );
    }

    /**
     * Add the request to get the website configured and available currencies
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetCurrencies(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::SETTINGS_CURRENCIES)->build());
    }

    /**
     * Add the request to get the website configured and available languages
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetLanguages(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::SETTINGS_LANGUAGES)->build());
    }

    /**
     * Returns the compiled version of the API.
     *
     * @return Version|NULL
     */
    public function getVersion(): ?Version {
        return $this->getElement(Version::class, Resource::VERSION);
    }

    /**
     * Add the request to get the compiled version of the API.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetVersion(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::VERSION)->build());
    }
}
