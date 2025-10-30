<?php

namespace SDK\Enums;

use SDK\Core\Enums\EnumList;

/**
 * This is the folter Discount ConditionsToBeMet value enumerate.
 *
 * @package SDK\Enums
 */
abstract class DiscountConditionsToBeMet extends EnumList {

    public const ACTIVITY_LIMIT = 'ACTIVITY_LIMIT';

    public const PERIOD = 'PERIOD';

    public const VALUE_NUM_ORDERS = 'VALUE_NUM_ORDERS';
}
