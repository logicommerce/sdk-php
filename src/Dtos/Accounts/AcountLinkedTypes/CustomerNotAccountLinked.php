<?php

namespace SDK\Dtos\Accounts\AcountLinkedTypes;

use SDK\Dtos\Accounts\AccountLinked;

/**
 * This is the customer not account linked main class.
 * The customer non-linked account information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CustomerNotAccountLinked::isAccountLinked()
 *
 * @see AccountLinked
 *
 * @package SDK\Dtos\Accounts\AcountLinkedTypes
 */

class CustomerNotAccountLinked extends AccountLinked {

    protected bool $accountLinked = false;

    function isAccountLinked(): bool {
        return $this->accountLinked;
    }
}
