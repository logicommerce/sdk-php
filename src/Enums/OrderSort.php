<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort order value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class OrderSort extends SortableEnum {

    public const ID = 'ID';

    public const NUMBER = 'NUMBER';

    public const DOCUMENTNUMBER = 'DOCUMENTNUMBER';

    public const DATE = 'DATE';
}
