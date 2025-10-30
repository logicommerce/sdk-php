<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the element type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class ElementType extends Enum {

    public const PRODUCT = 'PRODUCT';

    public const GIFT = 'GIFT';

    public const BUNDLE = 'BUNDLE';

    public const BUNDLE_ITEM = 'BUNDLE_ITEM';

    public const LINKED = 'LINKED';

}
