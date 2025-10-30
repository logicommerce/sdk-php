<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the discount apply to enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DiscountApplyTo extends Enum {

    public const PRODUCT = 'PRODUCT';

    public const SHIPPING = 'SHIPPING';

    public const TOTAL = 'TOTAL';
}
