<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort banner value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class BannerSort extends SortableEnum {

    public const ID = 'ID';

    public const PID = 'PID';

    public const PRIORITY = 'PRIORITY';
}
