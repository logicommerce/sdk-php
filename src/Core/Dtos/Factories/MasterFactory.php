<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Accounts\AccountEmployee;
use SDK\Dtos\Accounts\AccountRegisteredUser;
use SDK\Dtos\Accounts\Master;
use SDK\Enums\MasterType;

/**
 * Factory for creating simple account registered users.
 * 
 * @see AccountRegisteredUser
 * @see AccountEmployee
 * 
 * @package SDK\Core\Dtos\Factories
 */
abstract class MasterFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Accounts';

    protected const DEFAULT_CLASS = self::NAMESPACE . '\AccountRegisteredUser';

    /**
     * creates a simple account registered user
     * 
     * @param array $data
     * @return SimpleAccountRegisteredUser|null
     */
    public static function create(array $data): ?Master {
        $type = $data['type'] ?? null;
        if (!$type) {
            return new Master($data);
        }
        $masterType = MasterType::tryFrom($type);
        return $masterType ? self::createMaster($masterType, $data) : new Master($data);
    }

    private static function createMaster(string $masterType, array $data): Master {
        $master = new Master($data);
        match ($masterType) {
            MasterType::EMPLOYEE => $master = new AccountEmployee($data),
            MasterType::ACCOUNT_REGISTERED_USER => $master = new AccountRegisteredUser($data),
        };
        return $master;
    }

    public static function getElement(array $data = []): ?Master {
        return self::create($data);
    }
}
