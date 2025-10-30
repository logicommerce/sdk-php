<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Dtos\Accounts\AccountLinked;
use SDK\Dtos\Accounts\AcountLinkedTypes\CustomerAccountLinked;
use SDK\Dtos\Accounts\AcountLinkedTypes\CustomerNotAccountLinked;

/**
 * Factory for creating account linked.
 * 
 * @package SDK\Core\Dtos\Factories
 */
class AccountLinkedFactory {

	/**
	 * Creates an account.
	 * 
	 * @param array $data
	 * @return AccountLinked|null
	 */
	public static function create(array $data): ?AccountLinked {
		if (empty($data) || !isset($data['accountLinked'])) {
			return null;
		}
		if ($data['accountLinked']) {
			return new CustomerAccountLinked($data);
		}
		return new CustomerNotAccountLinked($data);
	}

}