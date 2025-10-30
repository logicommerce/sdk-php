<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\UserKeyCriteria;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the user account settings class.
 * The user account settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserAccountsSettings::getVerificationRequired()
 * @see UserAccountsSettings::getActivatedByDefault()
 * @see UserAccountsSettings::getPasswordPolicyActive()
 * @see UserAccountsSettings::getUserKeyCriteria()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class UserAccountsSettings extends Element {
    use ElementTrait, EnumResolverTrait;

    protected bool $verificationRequired = false;

    protected bool $activatedByDefault = false;

    protected bool $passwordPolicyActive = false;

    protected string $userKeyCriteria = '';

    /**
     * Returns if the verification is required for new user accounts.
     *
     * @return bool
     */
    public function getVerificationRequired(): bool {
        return $this->verificationRequired;
    }

    /**
     * Returns if the new user accounts will be automatically enabled or not.
     *
     * @return bool
     */
    public function getActivatedByDefault(): bool {
        return $this->activatedByDefault;
    }

    /**
     * Returns if the password policy is enabled.
     *
     * @return bool
     */
    public function getPasswordPolicyActive(): bool {
        return $this->passwordPolicyActive;
    }

    /**
     * Returns the user accounts settings user key criteria (pId or email).
     *
     * @return string
     */
    public function getUserKeyCriteria(): string { // ENUM
        return $this->getEnum(UserKeyCriteria::class, $this->userKeyCriteria, UserKeyCriteria::EMAIL);
    }
}
