<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the discounts sort enumerate.
 *
 * @package SDK\Enums
 */
abstract class DiscountSort extends SortableEnum {

    public const PRIORITY = 'PRIORITY';

    public const DISPLAYPRIORITY = 'DISPLAYPRIORITY';

    public const NAME = 'NAME';

    //@deprecated
    public const ACTIVATIONDATE = 'ACTIVATIONDATE';

    //@deprecated
    public const EXPIRATIONDATE = 'EXPIRATIONDATE';
}
