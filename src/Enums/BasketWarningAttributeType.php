<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the basket warning attributes types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class BasketWarningAttributeType extends Enum {

    public const INTEGER = 'INTEGER';

    public const LOCAL_DATE = 'LOCAL_DATE';

    public const LOCAL_DATE_TIME = 'LOCAL_DATE_TIME';

    public const STRING = 'STRING';
}
