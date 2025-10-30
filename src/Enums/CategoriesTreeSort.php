<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort categories tree value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class CategoriesTreeSort extends SortableEnum {

    public const ID = 'ID';

    public const PID = 'PID';

    public const NAME = 'NAME';

    public const PRIORITY = 'PRIORITY';

    public const DATEADDED = 'DATEADDED';
}
