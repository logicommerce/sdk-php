<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort blog category value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class BlogCategorySort extends SortableEnum {

    public const ID = 'ID';

    public const NAME = 'NAME';

    public const PRIORITY = 'PRIORITY';
}
