<?php

namespace SDK\Enums;

use SDK\Core\Enums\EnumList;

/**
 * This is the stock type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class StockType extends EnumList {

    public const NONE = 'NONE';

    public const AVAILABLE = 'AVAILABLE';

    public const AVAILABLE_AND_PREVISION = 'AVAILABLE_AND_PREVISION';

    public const AVAILABLE_PREVISION_AND_ONREQUEST = 'AVAILABLE_PREVISION_AND_ONREQUEST';
}
