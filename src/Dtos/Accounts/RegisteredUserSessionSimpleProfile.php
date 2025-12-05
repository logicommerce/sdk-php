<?php

namespace SDK\Dtos\Accounts;

/**
 * This is the registered user session simple profile main class.
 * The registered user session simple profile information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see RegisteredUserSessionSimpleProfile::getUsableAccounts()
 *
 * @see RegisteredUserSimpleProfile
 *
 * @package SDK\Dtos\Accounts
 */
class RegisteredUserSessionSimpleProfile extends RegisteredUserSimpleProfile {

    protected int $usableAccounts = 0;

    /**
     * Returns the number of usable accounts.
     *
     * @return int
     */
    public function getUsableAccounts(): int {
        return $this->usableAccounts;
    }
}
