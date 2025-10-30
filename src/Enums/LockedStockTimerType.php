<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the Locked Stock Timer Type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class LockedStockTimerType extends Enum {

    public const GLOBAL = 'GLOBAL';

    public const PRODUCT = 'PRODUCT';
}
