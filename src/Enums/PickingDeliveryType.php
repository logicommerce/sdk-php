<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the Picking Delivery Type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PickingDeliveryType extends Enum {

    public const PROVIDER_PICKUP_POINT = 'PROVIDER_PICKUP_POINT';

    public const PICKUP_POINT_PHYSICAL_LOCATION = 'PICKUP_POINT_PHYSICAL_LOCATION';
}
