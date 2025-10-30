<?php

namespace SDK\Core\Enums;

/**
 * This is the operative systems enumerate.
 *
 * @see Enum
 *
 * @package SDK\Core\Enums
 */
abstract class OS extends Enum {

    public const WINDOWS = 'Windows';

    public const LINUX = 'Linux';

    public const MAC = 'Mac';

    public const IOS = 'Ios';

    public const ANDROID = 'Android';

    public const UNKNOWN = 'Unknown';
}
