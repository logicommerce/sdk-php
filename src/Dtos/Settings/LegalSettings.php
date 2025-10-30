<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the legal settings class.
 * The legal settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see LegalSettings::getCookieActive()
 * @see LegalSettings::getCheckSubscription()
 * @see LegalSettings::getAutoAcceptCookies()
 * @see LegalSettings::getActiveGDPR()
 * @see LegalSettings::getUseCookiesByDefault()
 * @see LegalSettings::getAllowCookiesBlock()
 * @see LegalSettings::getRecordsMaintainedMonths()
 * @see LegalSettings::getLegalText()
 * @see LegalSettings::getPrivacyPolicy()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class LegalSettings extends Element {
    use ElementTrait;

    protected bool $cookieActive = false;

    protected bool $checkSubscription = false;

    protected bool $autoAcceptCookies = false;

    protected bool $activeGDPR = false;

    protected bool $useCookiesByDefault = false;

    protected bool $allowCookiesBlock = false;

    protected ?int $recordsMaintainedMonths = null;

    protected string $legalText = '';

    protected string $privacyPolicy = '';

    /**
     * Returns the legal settings cookie active.
     *
     * @return bool
     */
    public function getCookieActive(): bool {
        return $this->cookieActive;
    }

    /**
     * Returns the legal settings check subscription.
     *
     * @return bool
     */
    public function getCheckSubscription(): bool {
        return $this->checkSubscription;
    }

    /**
     * Returns the legal settings auto accept cookies.
     *
     * @return bool
     */
    public function getAutoAcceptCookies(): bool {
        return $this->autoAcceptCookies;
    }

    /**
     * Returns the legal settings active GDPR.
     *
     * @return bool
     */
    public function getActiveGDPR(): bool {
        return $this->activeGDPR;
    }

    /**
     * Returns the legal settings use cookies by default.
     *
     * @return bool
     */
    public function getUseCookiesByDefault(): bool {
        return $this->useCookiesByDefault;
    }

    /**
     * Returns the legal settings allow cookies block.
     *
     * @return bool
     */
    public function getAllowCookiesBlock(): bool {
        return $this->allowCookiesBlock;
    }

    /**
     * Returns the legal settings records naintained months.
     *
     * @return int|NULL
     */
    public function getRecordsMaintainedMonths(): ?int {
        return $this->recordsMaintainedMonths;
    }

    /**
     * Returns the legal settings legal text.
     *
     * @return string
     */
    public function getLegalText(): string {
        return $this->legalText;
    }

    /**
     * Returns the legal settings privacy policy.
     *
     * @return string
     */
    public function getPrivacyPolicy(): string {
        return $this->privacyPolicy;
    }
}