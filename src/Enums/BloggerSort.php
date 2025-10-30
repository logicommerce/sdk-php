<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort blogger value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class BloggerSort extends SortableEnum {

    public const ID = 'ID';

    public const NUMBEROFPOSTS = 'NUMBEROFPOSTS';

    public const NAME = 'NAME';
}
