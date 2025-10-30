<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the user group main class.
 * The user group information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserGroup::getDefaultGroup()
 * @see UserGroup::getSystemGroup()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\User
 */
class UserGroup {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, ElementNameTrait, ElementDescriptionTrait;

    protected bool $defaultGroup = false;

    protected bool $systemGroup = false;

    /**
     * Returns if this group is the default one for new users or not.
     *
     * @return bool
     */
    public function getDefaultGroup(): bool {
        return $this->defaultGroup;
    }

    /**
     * Returns if this group is a system group (administrators group).
     *
     * @return bool
     */
    public function getSystemGroup(): bool {
        return $this->systemGroup;
    }
}
