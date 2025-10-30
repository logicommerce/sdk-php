<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;

/**
 * This is the general settings class.
 * The general settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see GeneralSettings::getStoreURL()
 * @see GeneralSettings::getLogo()
 * @see GeneralSettings::getPhone()
 * @see GeneralSettings::getActive()
 * @see GeneralSettings::getDefaultCurrency()
 * @see GeneralSettings::getWeightUnits()
 * @see GeneralSettings::getTimeZone()
 * @see GeneralSettings::getMerchantInformation()
 * @see GeneralSettings::getMerchantEmail()
 * @see GeneralSettings::getDefaultCountry()
 * @see GeneralSettings::getDefaultLanguage()
 * @see GeneralSettings::getCdnAssets()
 * @see GeneralSettings::getCdnImages()
 * @see GeneralSettings::getLanguages()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\Settings
 */
class GeneralSettings extends Element {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait;

    protected string $storeURL = '';

    protected string $logo = '';

    protected string $phone = '';

    protected bool $active = false;

    protected string $defaultCurrency = '';

    protected string $defaultCountry = '';

    protected string $defaultLanguage = '';

    protected string $weightUnits = '';

    protected string $timeZone = '';

    protected string $merchantInformation = '';

    protected string $merchantEmail = '';

    protected string $cdnAssets = '';

    protected string $cdnImages = '';

    protected array $languages = [];

    /**
     * Returns the general settings store URL.
     *
     * @return string
     */
    public function getStoreURL(): string {
        return $this->storeURL;
    }

    /**
     * Returns the general settings logo.
     *
     * @return string
     */
    public function getLogo(): string {
        return $this->logo;
    }

    /**
     * Returns the general settings phone.
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns the general settings active.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Returns the general settings default currency.
     *
     * @return string
     */
    public function getDefaultCurrency(): string {
        return $this->defaultCurrency;
    }

    /**
     * Returns the general settings weight units.
     *
     * @return string
     */
    public function getWeightUnits(): string {
        return $this->weightUnits;
    }

    /**
     * Returns the general settings time zone.
     *
     * @return string
     */
    public function getTimeZone(): string {
        return $this->timeZone;
    }

    /**
     * Returns the general settings merchant information.
     *
     * @return string
     */
    public function getMerchantInformation(): string {
        return $this->merchantInformation;
    }

    /**
     * Returns the general settings merchant email.
     *
     * @return string
     */
    public function getMerchantEmail(): string {
        return $this->merchantEmail;
    }

    /**
     * Returns the general settings default country (ISO code).
     *
     * @return string
     */
    public function getDefaultCountry(): string {
        return $this->defaultCountry;
    }

    /**
     * Returns the general settings default language.
     *
     * @return string
     */
    public function getDefaultLanguage(): string {
        return $this->defaultLanguage;
    }

    /**
     * Returns the general settings assets CDN.
     *
     * @return string
     */
    public function getCdnAssets(): string {
        return $this->cdnAssets;
    }

    /**
     * Returns the general settings images CDN.
     *
     * @return string
     */
    public function getCdnImages(): string {
        return $this->cdnImages;
    }

    /**
     * Returns the general settings by language.
     *
     * @return SettingsLanguages[]
     */
    public function getlanguages(): array {
        return $this->languages;
    }

    protected function setlanguages(array $languages): void {
        $this->languages = $this->setArrayField($languages, SettingsLanguages::class);
    }

}
