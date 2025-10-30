<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort comments value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class CommentsSort extends SortableEnum {

    public const DATEADDED = 'DATEADDED';

    public const RATE = 'RATE';
}
