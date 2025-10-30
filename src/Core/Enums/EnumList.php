<?php

declare(strict_types=1);

namespace SDK\Core\Enums;

/**
 * This is the main sortable enumerates class.
 *
 * @see EnumList::areValid()
 *
 * @package SDK\Core\Enums
 */
abstract class EnumList extends Enum {

    /**
     * Check if the given values is a valid sortable value for the called enumerate.
     *
     * @param array $values
     *            Array that contains all the values to check
     *
     * @return bool
     */
    public static function areValid(array $values): bool {
        if (empty($values)) {
            return false;
        }
        foreach ($values as $value) {
            if (static::isValid($value) === false) {
                return false;
            }
        }
        return true;
    }
}
