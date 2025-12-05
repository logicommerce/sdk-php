<?php

declare(strict_types=1);

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the registered user exists main class.
 * The registered user existence information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see RegisteredUserExists::getExists()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Accounts
 */
class RegisteredUserExists extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected bool $exists = false;

    /**
     * Returns whether the registered user exists.
     *
     * @return bool
     */
    public function getExists(): bool {
        return $this->exists;
    }
}
