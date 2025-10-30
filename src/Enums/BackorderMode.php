<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the backorder mode enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class BackorderMode extends Enum {

    public const NONE = 'NONE';

    public const WITH_AND_WITHOUT_PREVISION = 'WITH_AND_WITHOUT_PREVISION';

    public const WITHOUT_PREVISION = 'WITHOUT_PREVISION';

    public const WITH_PREVISION = 'WITH_PREVISION';
}
