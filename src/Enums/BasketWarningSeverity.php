<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the basket warning code severities enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class BasketWarningSeverity extends Enum {

    public const INFO = 'INFO';

    public const WARNING = 'WARNING';

    public const ERROR = 'ERROR';
}
