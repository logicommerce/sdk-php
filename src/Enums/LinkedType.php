<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the linked type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class LinkedType extends Enum {

    public const RELATED = 'RELATED';

    public const EXTERNAL = 'EXTERNAL';

    public const LINKED = 'LINKED';

}
