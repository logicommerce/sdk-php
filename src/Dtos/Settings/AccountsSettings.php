<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the accounts settings class.
 * The accounts settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AccountsSettings::getActivatedByDefault()
 * @see AccountsSettings::getVerificationRequired()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class AccountsSettings extends Element {
    use ElementTrait;

    protected bool $activatedByDefault = false;

    protected bool $verificationRequired = false;

    /**
     * Returns if the accounts are activated by default.
     * 
     * @return bool
     */
    public function getActivatedByDefault(): bool {
        return $this->activatedByDefault;
    }

    /**
     * Returns if the accounts verification is required.
     * 
     * @return bool
     */
    public function getVerificationRequired(): bool {
        return $this->verificationRequired;
    }
}
