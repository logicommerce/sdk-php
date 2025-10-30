<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the shopping list rows sort enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class ShoppingListRowsSort extends SortableEnum {

    public const ADDEDDATE = 'ADDEDDATE';

    public const IMPORTANCE = 'IMPORTANCE';

    public const PRIORITY = 'PRIORITY';
}
