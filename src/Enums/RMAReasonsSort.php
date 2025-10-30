<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort RMA Reasons value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class RMAReasonsSort extends SortableEnum {

    public const ID = 'ID';

    public const DESCRIPTION = 'DESCRIPTION';

    public const PRIORITY = 'PRIORITY';
}
