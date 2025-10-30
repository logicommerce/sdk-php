<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the settings class.
 * The settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see EcommerceSettings::getMode()
 * @see EcommerceSettings::getGeneralSettings()
 * @see EcommerceSettings::getCatalogSettings()
 * @see EcommerceSettings::getGeoIPSettings()
 * @see EcommerceSettings::getLegalSettings()
 * @see EcommerceSettings::getOrdersSettings()
 * @see EcommerceSettings::getSeoSettings()
 * @see EcommerceSettings::getSitemapSettings()
 * @see EcommerceSettings::getStockSettings()
 * @see EcommerceSettings::getUserAccountsSettings()
 * @see EcommerceSettings::getTaxSettings()
 * @see EcommerceSettings::getBasketStockLockingSettings()
 * @see EcommerceSettings::getAccountsSettings()
 * @see EcommerceSettings::getRegisteredUsersSettings()
 * @see EcommerceSettings::getAccountRegisteredUsersSettings()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class EcommerceSettings extends Element {
    use ElementTrait;

    protected string $mode = '';

    protected ?GeneralSettings $generalSettings = null;

    protected ?CatalogSettings $catalogSettings = null;

    protected ?GeoIPSettings $geoIPSettings = null;

    protected ?LegalSettings $legalSettings = null;

    protected ?OrdersSettings $ordersSettings = null;

    protected ?SeoSettings $seoSettings = null;

    protected ?SitemapSettings $sitemapSettings = null;

    protected ?StockSettings $stockSettings = null;

    //@deprecated
    protected ?UserAccountsSettings $userAccountsSettings = null;

    protected ?TaxSettings $taxSettings = null;

    protected ?BasketStockLockingSettings $basketStockLockingSettings = null;

    protected ?AccountsSettings $accountsSettings = null;

    protected ?RegisteredUsersSettings $registeredUsersSettings = null;

    protected ?AccountRegisteredUsersSettings $accountRegisteredUsersSettings = null;

    /**
     * Returns the ecommerce mode.
     *
     * @return string
     */
    public function getMode(): string {
        return $this->mode;
    }

    /**
     * Returns the general settings.
     *
     * @return GeneralSettings|NULL
     */
    public function getGeneralSettings(): ?GeneralSettings {
        return $this->generalSettings;
    }

    protected function setGeneralSettings(array $generalSettings): void {
        $this->generalSettings = new GeneralSettings($generalSettings);
    }

    /**
     * Returns the catalog settings.
     *
     * @return CatalogSettings|NULL
     */
    public function getCatalogSettings(): ?CatalogSettings {
        return $this->catalogSettings;
    }

    protected function setCatalogSettings(array $catalogSettings): void {
        $this->catalogSettings = new CatalogSettings($catalogSettings);
    }

    /**
     * Returns the geoIP settings.
     *
     * @return GeoIPSettings|NULL
     */
    public function getGeoIPSettings(): ?GeoIPSettings {
        return $this->geoIPSettings;
    }

    protected function setGeoIPSettings(array $geoIPSettings): void {
        $this->geoIPSettings = new GeoIPSettings($geoIPSettings);
    }

    /**
     * Returns the legal settings.
     *
     * @return LegalSettings|NULL
     */
    public function getLegalSettings(): ?LegalSettings {
        return $this->legalSettings;
    }

    protected function setLegalSettings(array $legalSettings): void {
        $this->legalSettings = new LegalSettings($legalSettings);
    }

    /**
     * Returns the orders settings.
     *
     * @return OrdersSettings|NULL
     */
    public function getOrdersSettings(): ?OrdersSettings {
        return $this->ordersSettings;
    }

    protected function setOrdersSettings(array $ordersSettings): void {
        $this->ordersSettings = new OrdersSettings($ordersSettings);
    }

    /**
     * Returns the seo settings.
     *
     * @return SeoSettings|NULL
     */
    public function getSeoSettings(): ?SeoSettings {
        return $this->seoSettings;
    }

    protected function setSeoSettings(array $seoSettings): void {
        $this->seoSettings = new SeoSettings($seoSettings);
    }

    /**
     * Returns the sitemap settings.
     *
     * @return SitemapSettings|NULL
     */
    public function getSitemapSettings(): ?SitemapSettings {
        return $this->sitemapSettings;
    }

    protected function setSitemapSettings(array $sitemapSettings): void {
        $this->sitemapSettings = new SitemapSettings($sitemapSettings);
    }

    /**
     * Returns the stock settings.
     *
     * @return StockSettings|NULL
     */
    public function getStockSettings(): ?StockSettings {
        return $this->stockSettings;
    }

    protected function setStockSettings(array $stockSettings): void {
        $this->stockSettings = new StockSettings($stockSettings);
    }

    /**
     * Returns the userAccounts settings.
     *
     * @return UserAccountsSettings|NULL
     * @deprecated
     */
    public function getUserAccountsSettings(): ?UserAccountsSettings {
        if (is_null($this->userAccountsSettings)) {
            $this->userAccountsSettings = new UserAccountsSettings([
                "verificationRequired" => $this->getAccountsSettings()->getVerificationRequired(),
                "activatedByDefault" => $this->getAccountsSettings()->getActivatedByDefault(),
                "passwordPolicyActive" => $this->getRegisteredUsersSettings()->getPasswordPolicyActive(),
                "userKeyCriteria" => $this->getRegisteredUsersSettings()->getKeyCriteria()
            ]);
        }
        return $this->userAccountsSettings;
    }

    //@deprecated
    protected function setUserAccountsSettings(array $userAccountsSettings): void {
        $this->userAccountsSettings = new UserAccountsSettings($userAccountsSettings);
    }

    /**
     * Returns the tax settings.
     *
     * @return TaxSettings|NULL
     */
    public function getTaxSettings(): ?TaxSettings {
        return $this->taxSettings;
    }

    protected function setTaxSettings(array $taxSettings): void {
        $this->taxSettings = new TaxSettings($taxSettings);
    }

    /**
     * Returns the tax settings.
     *
     * @return BasketStockLockingSettings|NULL
     */
    public function getBasketStockLockingSettings(): ?BasketStockLockingSettings {
        return $this->basketStockLockingSettings;
    }

    protected function setBasketStockLockingSettings(array $basketStockLockingSettings): void {
        $this->basketStockLockingSettings = new BasketStockLockingSettings($basketStockLockingSettings);
    }

    /**
     * Returns the accounts settings.
     *
     * @return AccountsSettings|NULL
     */
    public function getAccountsSettings(): ?AccountsSettings {
        return $this->accountsSettings;
    }

    protected function setAccountsSettings(array $accountsSettings): void {
        $this->accountsSettings = new AccountsSettings($accountsSettings);
    }

    /**
     * Returns the registeredUsers settings.
     *
     * @return RegisteredUsersSettings|NULL
     */
    public function getRegisteredUsersSettings(): ?RegisteredUsersSettings {
        return $this->registeredUsersSettings;
    }

    protected function setRegisteredUsersSettings(array $registeredUsersSettings): void {
        $this->registeredUsersSettings = new RegisteredUsersSettings($registeredUsersSettings);
    }

    /**
     * Returns the accountRegisteredUsers settings.
     *
     * @return AccountRegisteredUsersSettings|NULL
     */
    public function getAccountRegisteredUsersSettings(): ?AccountRegisteredUsersSettings {
        return $this->accountRegisteredUsersSettings;
    }

    protected function setAccountRegisteredUsersSettings(array $accountRegisteredUsersSettings): void {
        $this->accountRegisteredUsersSettings = new AccountRegisteredUsersSettings($accountRegisteredUsersSettings);
    }
}
