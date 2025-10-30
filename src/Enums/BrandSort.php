<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort brand value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class BrandSort extends SortableEnum {

    public const ID = 'ID';

    public const PID = 'PID';

    public const PRIORITY = 'PRIORITY';

    public const NAME = 'NAME';
}
