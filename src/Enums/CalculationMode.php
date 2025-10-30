<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the applied discounts calculation mode enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class CalculationMode extends Enum {

    public const FIXED_UNITS = 'FIXED_UNITS';

    public const PERCENTAGE_OVER_UNITS = 'PERCENTAGE_OVER_UNITS';

    public const FIXED_AMOUNT = 'FIXED_AMOUNT';

    public const PERCENTAGE_OVER_TOTAL = 'PERCENTAGE_OVER_TOTAL';
}
