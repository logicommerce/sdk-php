<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the additional RMA item type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class AdditionalRMAItemType extends Enum {
    
    public const SHIPPING = 'SHIPPING';

    public const PAYMENT = 'PAYMENT';

    public const VOUCHER = 'VOUCHER';
}
