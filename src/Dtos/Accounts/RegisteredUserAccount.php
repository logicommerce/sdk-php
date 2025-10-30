<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\BaseAccountRegisteredUserTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * Represents a registered user account.
 * 
 * @see Element
 * @see ElementTrait
 * @see BaseAccountRegisteredUserTrait
 * @see AccountHeader
 * 
 * @package SDK\Dtos\Accounts
 */
class RegisteredUserAccount extends Element {
    use ElementTrait, BaseAccountRegisteredUserTrait;

    protected ?AccountHeader $account = null;

    /**
     * Returns the account.
     *
     * @return AccountHeader
     */
    public function getAccount(): ?AccountHeader {
        return $this->account;
    }

    protected function setAccount(array $account): void {
        $this->account = new AccountHeader($account);
    }
}
