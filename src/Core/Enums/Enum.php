<?php

declare(strict_types=1);

namespace SDK\Core\Enums;

/**
 * This is the main enumerates class.
 *
 * @see Enum::isValid()
 *
 * @package SDK\Core\Enums
 */
abstract class Enum {

    private static array $constants = [];

    public static function getValues(): array {
        if (!isset(self::$constants[static::class])) {
            self::$constants[static::class] = (new \ReflectionClass(static::class))->getConstants();
        }
        return self::$constants[static::class];
    }

    /**
     * Check if the given value is inside the called enumerate.
     *
     * @param string $value
     *            value to check
     *
     * @return bool
     */
    public static function isValid(string $value): bool {
        return in_array($value, static::getValues(), true);
    }

    /**
     * Check if the given value is inside the called enumerate.
     *
     * @param string $value
     *            value to check
     *
     * @return string|null
     */
    public static function tryFrom(string $value): ?string {
        return static::isValid($value) ? $value : null;
    }
}
