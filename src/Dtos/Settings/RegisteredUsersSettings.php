<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\UserKeyCriteria;

/**
 * This is the registered users settings class.
 * The registered users settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RegisteredUsersSettings::getKeyCriteria()
 * @see RegisteredUsersSettings::isPasswordPolicyActive()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class RegisteredUsersSettings extends Element {
    use ElementTrait, EnumResolverTrait;

    protected string $keyCriteria = '';

    protected bool $passwordPolicyActive = false;

    /**
     * Returns the key criteria.
     *
     * @return string
     */
    public function getKeyCriteria(): string {
        return $this->getEnum(UserKeyCriteria::class, $this->keyCriteria, UserKeyCriteria::EMAIL);
    }

    /**
     * Returns if the password policy is enabled.
     *
     * @return bool
     */
    public function getPasswordPolicyActive(): bool {
        return $this->passwordPolicyActive;
    }
}
