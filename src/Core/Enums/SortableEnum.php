<?php

declare(strict_types=1);

namespace SDK\Core\Enums;

/**
 * This is the main sortable enumerates class.
 *
 * @see SortableEnum::isValid()
 *
 * @package SDK\Core\Enums
 */
abstract class SortableEnum extends EnumList {

    public const SORT_DIRECTION_ASC = 'ASC';

    public const SORT_DIRECTION_DESC = 'DESC';

    /**
     * Check if the given value is a valid sortable value for the called enumerate.
     *
     * @param string $value
     *            value to check
     *
     * @return bool
     */
    public static function isValid(string $value): bool {
        $validValues = self::getValues();
        $value = strtoupper($value);
        foreach ($validValues as $currentValue) {
            $validValue = strtoupper($currentValue);
            if (
                $validValue === $value ||
                $validValue . '.' . self::SORT_DIRECTION_ASC === $value ||
                $validValue . '.' . self::SORT_DIRECTION_DESC === $value
            ) {
                return true;
            }
        }
        return false;
    }
}
