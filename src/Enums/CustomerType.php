<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the customer type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class CustomerType extends Enum {

    public const EMPTY = 'EMPTY';

    public const INDIVIDUAL = 'INDIVIDUAL';

    public const COMPANY = 'COMPANY';

    public const FREELANCE = 'FREELANCE';

    public static function fromUserType(string $userType): string {
        $normalizedType = UserType::getEnum($userType);

        switch ($normalizedType) {
            case UserType::PARTICULAR:
                return self::INDIVIDUAL;
            case UserType::BUSINESS:
                return self::COMPANY;
            case UserType::FREELANCE:
                return self::FREELANCE;
            default:
                return self::EMPTY;
        }
    }
}
