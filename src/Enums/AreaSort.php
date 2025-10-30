<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort area value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class AreaSort extends SortableEnum {

    public const ID = 'ID';

    public const PID = 'PID';

    public const PRIORITY = 'PRIORITY';
}
