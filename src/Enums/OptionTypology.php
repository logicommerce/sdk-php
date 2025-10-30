<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the option typology enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class OptionTypology extends Enum {

    public const SIZE = 'SIZE';

    public const COLOR = 'COLOR';

    public const MATERIAL = 'MATERIAL';

    public const OTHER = 'OTHER';

    public const WITHOUT_TYPOLOGY = 'WITHOUT_TYPOLOGY';
}
