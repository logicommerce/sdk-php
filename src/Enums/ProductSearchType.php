<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the product search type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class ProductSearchType extends Enum {

    public const PARTIAL = 'PARTIAL';

    public const COMPLETE = 'COMPLETE';

    public const COMPLETE_WITH_SPACES = 'COMPLETE_WITH_SPACES';

    public const SHOULD_APPEAR_PARTIAL = 'SHOULD_APPEAR_PARTIAL';
}
