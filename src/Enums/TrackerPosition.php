<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the tracker position enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class TrackerPosition extends Enum {

    public const HEAD_TOP = 'HEAD_TOP';

    public const HEAD_BOTTOM = 'HEAD_BOTTOM';

    public const BODY_TOP = 'BODY_TOP';

    public const BODY_BOTTOM = 'BODY_BOTTOM';
}
