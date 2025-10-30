<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the account type enumerate.
 * 
 * @package SDK\Enums
 */

abstract class AccountType extends Enum {

    public const GENERAL = 'GENERAL';

    public const INDIVIDUAL = 'INDIVIDUAL';

    public const FREELANCE = 'FREELANCE';

    public const COMPANY = 'COMPANY';

    public const COMPANY_DIVISION = 'COMPANY_DIVISION';

    public static function getCompanyTypes(): array {
        return [
            self::COMPANY,
            self::COMPANY_DIVISION,
        ];
    }

    public static function fromUserType(string $userType, string $generalRestriction = GeneralRestriction::ONLY_GENERAL): string {
        if ($generalRestriction === GeneralRestriction::ONLY_GENERAL) {
            return self::GENERAL;
        }
        $normalizedType = UserType::getEnum($userType);

        switch ($normalizedType) {
            case UserType::PARTICULAR:
                return self::INDIVIDUAL;
            case UserType::BUSINESS:
                return self::COMPANY;
            case UserType::FREELANCE:
                return self::FREELANCE;
            default:
                return $userType;
        }
    }
}
