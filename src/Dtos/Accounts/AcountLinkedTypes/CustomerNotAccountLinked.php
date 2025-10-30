<?php

namespace SDK\Dtos\Accounts\AcountLinkedTypes;

use SDK\Dtos\Accounts\AccountLinked;

/**
 * Represents a customer not account linked.
 *
 * @see AccountLinked
 */
class CustomerNotAccountLinked extends AccountLinked {

	protected bool $accountLinked = false;

	function isAccountLinked(): bool {
		return $this->accountLinked;
	}
}