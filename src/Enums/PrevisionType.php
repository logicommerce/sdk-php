<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the prevision types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PrevisionType extends Enum {

    public const RESERVE = 'RESERVE';

    public const PREVISION = 'PREVISION';

    public const AVAILABLE = 'AVAILABLE';
}
