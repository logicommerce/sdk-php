<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the importance enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class Importance extends Enum {

    public const LOWEST = 'LOWEST';

    public const LOW = 'LOW';

    public const MEDIUM = 'MEDIUM';

    public const HIGH = 'HIGH';

    public const HIGHEST = 'HIGHEST';

}
