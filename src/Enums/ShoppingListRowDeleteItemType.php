<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the Shopping list row delete item type enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class ShoppingListRowDeleteItemType extends SortableEnum {

    public const PRODUCT = 'PRODUCT';

    public const BUNDLE = 'BUNDLE';

    public const SHOPPING_LIST_ROW = 'SHOPPING_LIST_ROW';
}
