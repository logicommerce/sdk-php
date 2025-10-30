<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\GeoIPMode;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the geoIP settings class.
 * The geoIP settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see GeoIPSettings::getMode()
 * @see GeoIPSettings::getRedirectOnlyFirstTime()
 * @see GeoIPSettings::getWarningMessage()
 * @see GeoIPSettings::getRedirectionUrl()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class GeoIPSettings extends Element {
    use ElementTrait, EnumResolverTrait;

    protected string $mode = '';

    protected bool $redirectOnlyFirstTime = false;

    protected string $warningMessage = '';

    protected string $redirectionUrl = '';

    /**
     * Returns the geoIp settings mode.
     *
     * @return string
     */
    public function getMode(): string { // ENUM
        return $this->getEnum(GeoIPMode::class, $this->mode, GeoIPMode::DISABLED);
    }

    /**
     * Returns if the geoIp settings will redirect only the first time.
     *
     * @return bool
     */
    public function getRedirectOnlyFirstTime(): bool {
        return $this->redirectOnlyFirstTime;
    }

    /**
     * Returns the geoIp settings warning message.
     *
     * @return string
     */
    public function getWarningMessage(): string {
        return $this->warningMessage;
    }

    /**
     * Returns the geoIp settings redirection url.
     *
     * @return string
     */
    public function getRedirectionUrl(): string {
        return $this->redirectionUrl;
    }
}
