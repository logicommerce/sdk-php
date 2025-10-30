<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Accounts\AccountRegisteredUserRef;
use SDK\Dtos\Accounts\EmployeeRef;
use SDK\Dtos\Accounts\MasterRef;
use SDK\Enums\MasterType;

/**
 * Factory for creating simple account registered users.
 * 
 * @see AccountRegisteredUserRef
 * @see EmployeeRef
 * 
 * @package SDK\Core\Dtos\Factories
 */
abstract class MasterRefFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Accounts';

    protected const DEFAULT_CLASS = self::NAMESPACE . '\AccountRegisteredUserRef';

    /**
     * Create a master reference.
     * 
     * @param array $data
     * @return MasterRef|null
     */
    public static function create(array $data): ?MasterRef {
        $type = $data['type'] ?? null;
        if (!$type) {
            return new MasterRef($data);
        }
        $masterType = MasterType::tryFrom($type);
        return $masterType ? self::createMaster($masterType, $data) : new MasterRef($data);
    }

    private static function createMaster(string $masterType, array $data): MasterRef {
        $master = new MasterRef($data);
        match ($masterType) {
            MasterType::EMPLOYEE => $master = new EmployeeRef($data),
            MasterType::ACCOUNT_REGISTERED_USER => $master = new AccountRegisteredUserRef($data),
        };
        return $master;
    }

    public static function getElement(array $data = []): ?MasterRef {
        return self::create($data);
    }
}
