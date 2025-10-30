<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the sitemap interval multiplier enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class SitemapIntervalMultiplier extends Enum {

    public const HOURS = 'HOURS';

    public const DAYS = 'DAYS';

    public const WEEKS = 'WEEKS';

    private const MULTIPLIER_VALUES = [
        self::HOURS => 1,
        self::DAYS => 24,
        self::WEEKS => 168
    ];

    /**
     * Returns the numeric value for the given key value of the enumerate.
     *
     * @return int|NULL
     */
    public static function getMultiplier(string $enumValue): ?int {
        return self::MULTIPLIER_VALUES[$enumValue] ?? null;
    }
}
