<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort custom tag value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class CustomTagSort extends SortableEnum {

    public const ID = 'ID';

    public const POSITION = 'POSITION';

    public const PRIORITY = 'PRIORITY';
}
