<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the Discount Condition ValueType enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DiscountConditionValueType extends Enum {

    public const UNITS = 'UNITS';

    public const AMOUNT_SPENT = 'AMOUNT_SPENT';

    public const NUM_ORDERS = 'NUM_ORDERS';
}
