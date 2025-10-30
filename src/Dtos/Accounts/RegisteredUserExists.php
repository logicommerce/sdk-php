<?php

declare(strict_types=1);

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This DTO represents the response for checking if a registered user exists.
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
