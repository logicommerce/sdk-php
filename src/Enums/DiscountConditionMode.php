<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the Discount Condition mode enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DiscountConditionMode extends Enum {

    public const FROM = 'FROM';

    public const RANGE = 'RANGE';

    public const EACH = 'EACH';
}
