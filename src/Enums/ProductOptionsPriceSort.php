<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort product options price value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class ProductOptionsPriceSort extends SortableEnum {

    public const PRICE = 'PRICE';

    public const PRIORITY = 'PRIORITY';
}
