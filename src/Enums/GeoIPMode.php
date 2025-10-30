<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the GeoIP mode enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class GeoIPMode extends Enum {

    public const DISABLED = 'DISABLED';

    public const STRICT = 'STRICT';

    public const INFORMATIVE = 'INFORMATIVE';

    public const STRICT_INFORMATIVE = 'STRICT_INFORMATIVE';
}
