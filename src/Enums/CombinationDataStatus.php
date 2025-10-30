<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the Current Data Status enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class CombinationDataStatus extends Enum {

    public const AVAILABLE = 'AVAILABLE';

    public const RESERVE = 'RESERVE';

    public const UNAVAILABLE = 'UNAVAILABLE';

    public const SELECT_OPTION = 'SELECT_OPTION';
}
