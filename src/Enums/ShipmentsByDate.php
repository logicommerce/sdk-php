<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the shipments by date enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class ShipmentsByDate extends Enum {

    public const NEVER = 'NEVER';

    public const ALWAYS = 'ALWAYS';

    public const BOTH = 'BOTH';
}
