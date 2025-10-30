<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the user exists main class.
 * The user exists information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserExists::getExists()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class UserExists extends Element {
    use ElementTrait;

    protected bool $exists = false;

    /**
     * Returns if the user exists.
     *
     * @return bool
     */
    public function getExists(): bool {
        return $this->exists;
    }
}
