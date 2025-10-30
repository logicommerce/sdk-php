<?php

namespace SDK\Enums;
use SDK\Core\Enums\Enum;

/**
 * This is the order detail type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class OrderDetailType extends Enum {

    public const PRODUCT = 'PRODUCT';

    public const GIFT = 'GIFT';

    public const LINKED = 'LINKED';

    public const BUNDLE = 'BUNDLE';

    public const VOUCHER_PURCHASE = 'VOUCHER_PURCHASE';
}
