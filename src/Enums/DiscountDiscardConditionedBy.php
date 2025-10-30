<?php

namespace SDK\Enums;

use SDK\Core\Enums\EnumList;

/**
 * This is the filter Discount DiscardConditionedBy value enumerate.
 *
 * @package SDK\Enums
 */
abstract class DiscountDiscardConditionedBy extends EnumList {

    public const PERIOD = 'PERIOD';

    public const ACTIVITY_LIMIT = 'ACTIVITY_LIMIT';

    public const VALUE = 'VALUE';

    public const RESTRICTION = 'RESTRICTION';

    public const SHIPPING_TYPE = 'SHIPPING_TYPE';

    public const COMBINATION = 'COMBINATION';

    public const BRAND = 'BRAND';

    public const VOUCHER = 'VOUCHER';

    public const USER = 'USER';

    public const LOCATION = 'LOCATION';
}
