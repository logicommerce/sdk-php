<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Accounts\Account;

/**
 * Factory for creating accounts.
 * 
 * @package SDK\Core\Dtos\Factories
 */
abstract class AccountFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Accounts\AccountTypes';

    protected const DEFAULT_CLASS = self::NAMESPACE . '\GeneralAccount';

    /**
     * Creates an account.
     * 
     * @param array $data
     * @return Account|null
     */
    public static function getAccount(array $data = []): ?Account {
        return self::getItem($data);
    }

    public static function getElement(array $data = []): ?Account {
        return self::getAccount($data);
    }
}
