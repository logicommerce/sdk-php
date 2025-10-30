<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Accounts\AccountRegisteredUserVal;
use SDK\Dtos\Accounts\EmployeeVal;
use SDK\Dtos\Accounts\MasterVal;
use SDK\Enums\MasterType;

/**
 * Factory for creating simple account registered users.
 * 
 * @see AccountRegisteredUserVal
 * @see EmployeeVal
 * 
 * @package SDK\Core\Dtos\Factories
 */
abstract class MasterValFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Accounts';

    protected const DEFAULT_CLASS = self::NAMESPACE . '\AccountRegisteredUserVal';

    /**
     * creates a simple account registered user
     * 
     * @param array $data
     * @return MasterVal|null
     */
    public static function create(array $data): ?MasterVal {
        $type = $data['type'] ?? null;
        if (!$type) {
            return new MasterVal($data);
        }
        $masterType = MasterType::tryFrom($type);
        return $masterType ? self::createMaster($masterType, $data) : new MasterVal($data);
    }

    private static function createMaster(string $masterType, array $data): MasterVal {
        $master = new MasterVal($data);
        match ($masterType) {
            MasterType::EMPLOYEE => $master = new EmployeeVal($data),
            MasterType::ACCOUNT_REGISTERED_USER => $master = new AccountRegisteredUserVal($data),
        };
        return $master;
    }

    public static function getElement(array $data = []): ?MasterVal {
        return self::create($data);
    }
}
