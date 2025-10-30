<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the tracker type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class TrackerType extends Enum {

    public const DEFAULT = 'DEFAULT';

    public const PLUGIN = 'PLUGIN';
}
