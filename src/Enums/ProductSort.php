<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort product value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class ProductSort extends SortableEnum {

    public const ID = 'ID';

    public const PID = 'PID';

    public const SKU = 'SKU';

    public const NAME = 'NAME';

    public const PRIORITY = 'PRIORITY';

    public const PRICE = 'PRICE';

    public const OFFER = 'OFFER';

    public const FEATURED = 'FEATURED';

    public const DATEADDED = 'DATEADDED';

    public const PUBLICATIONDATE = 'PUBLICATIONDATE';
}
