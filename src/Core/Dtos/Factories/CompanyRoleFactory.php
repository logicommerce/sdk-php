<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Accounts\CompanyRole;

/**
 * Factory for creating company roles.
 * 
 * @see CompanyRole
 * @see BasicFixedCompanyRole
 * @see CustomCompanyRole
 * 
 * @package SDK\Dtos\Accounts
 */
abstract class CompanyRoleFactory extends Factory {

    protected const TYPE = 'type';

    protected const CLASS_SUFFIX = 'CompanyRole';

    protected const NAMESPACE = 'SDK\Dtos\Accounts';

    /**
     * Creates a company role.
     * 
     * @param array $data
     * @return CompanyRole|null
     */
    public static function getCompanyRole(array $data = []): ?CompanyRole {
        return self::getItem($data);
    }

    public static function getElement(array $data = []): ?CompanyRole {
        return self::getCompanyRole($data);
    }
}
