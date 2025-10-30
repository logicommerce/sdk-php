<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the address type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class AccountAddressType extends Enum {

    public const INVOICING = 'INVOICING';

    public const SHIPPING = 'SHIPPING';
}
