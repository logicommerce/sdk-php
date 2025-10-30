<?php

namespace SDK\Dtos\Accounts;

/**
 * Registered user session simple profile class.
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

	protected function setUsableAccounts(int $usableAccounts): void {
		$this->usableAccounts = $usableAccounts;
	}

}