<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the shopping lists sort enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class ShoppingListsSort extends SortableEnum {

    public const ADDEDDATE = 'ADDEDDATE';

    public const NAME = 'NAME';

    public const PRIORITY = 'PRIORITY';
}
