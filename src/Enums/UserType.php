<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the user type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class UserType extends Enum {

    /** @deprecated - Use INDIVIDUAL instead */
    public const PARTICULAR = 'PARTICULAR';

    public const INDIVIDUAL = 'INDIVIDUAL';

    /** @deprecated - Use COMPANY instead */
    public const BUSINESS = 'BUSINESS';

    public const COMPANY = 'COMPANY';

    public const COMPANY_DIVISION = 'COMPANY_DIVISION';

    public const FREELANCE = 'FREELANCE';

    public const EMPTY = 'EMPTY';

    public static function getEnum(string $value, string $defaultValue = UserType::EMPTY): string {
        // Temporary fix for the userType values for ADVCA
        if ($value === 'INDIVIDUAL' || $value === 'PARTICULAR') {
            return UserType::PARTICULAR;
        }

        // Temporary fix for the userType values for ADVCA
        if ($value === 'COMPANY' || $value === 'COMPANY_DIVISION' || $value === 'BUSINESS') {
            return UserType::BUSINESS;
        }

        if ($value === 'FREELANCE') {
            return UserType::FREELANCE;
        }
        if ($value === 'EMPTY') {
            return UserType::EMPTY;
        }
        return $defaultValue;
    }
}
