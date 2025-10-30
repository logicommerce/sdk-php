<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the tracker scope type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class TrackerScopeType extends Enum {

    public const CODE = 'CODE';

    public const IFRAME = 'IFRAME';
}
