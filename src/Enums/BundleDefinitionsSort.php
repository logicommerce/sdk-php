<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort bundle definitions value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class BundleDefinitionsSort extends SortableEnum {

    public const PRIORITY = 'PRIORITY';

    public const NAME = 'NAME';
}
