<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the user account settings class.
 * The user account settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AccountRegisteredUsersSettings::getCardinalityPlus()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class AccountRegisteredUsersSettings extends Element {
    use ElementTrait;

    protected bool $cardinalityPlus = false;

    /**
     * Returns if the cardinality plus is enabled.
     * 
     * @return bool
     */
    public function getCardinalityPlus(): bool {
        return $this->cardinalityPlus;
    }
}
