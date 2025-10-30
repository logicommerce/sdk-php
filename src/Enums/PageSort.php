<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort page value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class PageSort extends SortableEnum {

    public const ID = 'ID';

    public const PID = 'PID';

    public const NAME = 'NAME';

    public const PRIORITY = 'PRIORITY';
}
