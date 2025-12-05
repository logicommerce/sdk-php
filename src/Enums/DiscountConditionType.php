<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the Discount Condition enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DiscountConditionType extends Enum {

    public const ACCOUNT = 'ACCOUNT';

    public const PERIOD = 'PERIOD';

    public const ACTIVITY_LIMIT = 'ACTIVITY_LIMIT';

    public const VALUE = 'VALUE';

    public const RESTRICTION = 'RESTRICTION';

    public const SHIPPING_TYPE = 'SHIPPING_TYPE';

    public const CATALOG = 'CATALOG';

    public const COMBINATION = 'COMBINATION';

    public const BRAND = 'BRAND';

    public const VOUCHER = 'VOUCHER';

    public const USER = 'USER';

    public const LOCATION = 'LOCATION';
}
