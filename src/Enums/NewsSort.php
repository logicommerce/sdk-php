<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort news value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class NewsSort extends SortableEnum {

    public const PRIORITY = 'PRIORITY';

    public const PUBLICATIONDATE = 'PUBLICATIONDATE';
}
