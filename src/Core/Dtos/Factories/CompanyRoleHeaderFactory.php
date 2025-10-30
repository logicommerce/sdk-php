<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Accounts\CompanyRoleHeader;

/**
 * Factory for creating company roles headers.
 * 
 * @see CompanyRoleHeader
 * @see BasicFixedCompanyRoleHeader
 * @see CustomCompanyRoleHeader
 * 
 * @package SDK\Dtos\Accounts
 */
abstract class CompanyRoleHeaderFactory extends Factory {

    protected const TYPE = 'type';

    protected const CLASS_SUFFIX = 'CompanyRoleHeader';

    protected const NAMESPACE = 'SDK\Dtos\Accounts';

    /**
     * Creates a company role header.
     * 
     * @param array $data
     * @return CompanyRoleHeader|null
     */
    public static function getCompanyRoleHeader(array $data = []): ?CompanyRoleHeader {
        return self::getItem($data);
    }

    public static function getElement(array $data = []): ?CompanyRoleHeader {
        return self::getCompanyRoleHeader($data);
    }
}
