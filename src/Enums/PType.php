<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the PType enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PType extends Enum {

    public const LC = 'LC';

    public const ADDON = 'ADDON';

    public const PLUGIN = 'PLUGIN';

    public const SUPPORT = 'SUPPORT';

}
