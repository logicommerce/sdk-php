<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the filter indexable type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class FilterIndexableType extends Enum {

    public const ALL = 'ALL';

    public const INDEXABLE = 'INDEXABLE';

    public const NO_INDEXABLE = 'NO_INDEXABLE';

}
