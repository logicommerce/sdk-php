<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the Discount Condition RestrictionType enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DiscountConditionRestrictionType extends Enum {

    public const NO_APPLY_TO_BUNDLES = 'NO_APPLY_TO_BUNDLES';

    public const NO_APPLY_TO_SALES = 'NO_APPLY_TO_SALES';

    public const NO_APPLY_TO_LINKEDS = 'NO_APPLY_TO_LINKEDS';
}
