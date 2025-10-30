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
abstract class AddressType extends Enum {

    public const BILLING = 'BILLING';

    public const SHIPPING = 'SHIPPING';
}
