<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the discount type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DiscountType extends Enum {

    public const AMOUNT = 'AMOUNT';

    public const AMOUNT_COMBINATION = 'AMOUNT_COMBINATION';

    public const GIFT = 'GIFT';

    public const UNIT = 'UNIT';

    public const SELECTABLE_GIFT = 'SELECTABLE_GIFT';

    public const MXN = 'MXN';

    public const PERCENT_N_UNIT = 'PERCENT_N_UNIT';

    public const REWARD_POINTS = 'REWARD_POINTS';
}
