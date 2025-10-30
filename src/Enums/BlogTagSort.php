<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort blog tag value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class BlogTagSort extends SortableEnum {

    public const ID = 'ID';

    public const NUMBEROFPOSTS = 'NUMBEROFPOSTS';

    public const VALUE = 'VALUE';
}
