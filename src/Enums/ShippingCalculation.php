<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the shipping calculation enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class ShippingCalculation extends Enum {

    public const BY_WEIGHT = 'BY_WEIGHT';

    public const BY_UNITS = 'BY_UNITS';
}
