<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the amount increase type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class AmountType extends Enum {

    public const ABSOLUTE = 'ABSOLUTE';

    public const PERCENTAGE = 'PERCENTAGE';
}
