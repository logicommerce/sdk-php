<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort category value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class CategorySort extends SortableEnum {

    public const ID = 'ID';

    public const PID = 'PID';

    public const PRIORITY = 'PRIORITY';

    public const NAME = 'NAME';

    public const DATEADDED = 'DATEADDED';
}
