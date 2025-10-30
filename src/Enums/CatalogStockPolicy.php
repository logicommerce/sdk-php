<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the catalog stock policy enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class CatalogStockPolicy extends Enum {

    public const BY_CHANNEL = 'BY_CHANNEL';

    public const BY_ASSIGNED_WAREHOUSES = 'BY_ASSIGNED_WAREHOUSES';
}
