<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the delivery types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DeliveryType extends Enum {

    public const SHIPPING = 'SHIPPING';

    public const PICKING = 'PICKING';
}
