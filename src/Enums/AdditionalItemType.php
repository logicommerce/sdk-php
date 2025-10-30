<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the additional item type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class AdditionalItemType extends Enum {

    public const SHIPPING = 'SHIPPING';

    public const PAYMENT = 'PAYMENT';

    public const VOUCHER = 'VOUCHER';
}
