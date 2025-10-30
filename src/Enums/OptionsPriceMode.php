<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the options price mode enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class OptionsPriceMode extends Enum {

    public const NONE = 'NONE';

    public const PRIORITY = 'PRIORITY';

    public const CHEAPEST = 'CHEAPEST';
}
