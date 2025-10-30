<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the settings languages class.
 * The settings languages will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SettingsLanguages::getLanguageCode()
 * @see SettingsLanguages::getStoreURL()
 * @see SettingsLanguages::getLogo()
 * 
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class SettingsLanguages extends Element {
    use ElementTrait;

    protected string $languageCode = '';

    protected string $storeURL = '';

    protected string $logo = '';

    /**
     * Returns the settings languages languageCode value.
     *
     * @return string
     */
    public function getLanguageCode(): string {
        return $this->languageCode;
    }

    /**
     * Returns the settings languages storeURL value.
     *
     * @return string
     */
    public function getStoreURL(): string {
        return $this->storeURL;
    }

    /**
     * Returns the settings languages logo value.
     *
     * @return string
     */
    public function getLogo(): string {
        return $this->logo;
    }

}
