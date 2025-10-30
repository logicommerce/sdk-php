<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the basket warning code enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class BasketWarningCode extends Enum {

    public const BACKORDER = 'BACKORDER';

    public const BACKORDER_PREVISION = 'BACKORDER_PREVISION';

    public const INVALID_BILLING_ADDRESS = 'INVALID_BILLING_ADDRESS';

    public const INVALID_PRICE = 'INVALID_PRICE';

    public const INVALID_SHIPPING_ADDRESS = 'INVALID_SHIPPING_ADDRESS';

    public const LOCKED_STOCK_MISSING_UNITS = 'LOCKED_STOCK_MISSING_UNITS';

    public const LOCKED_STOCK_NO_UNITS = 'LOCKED_STOCK_NO_UNITS';

    public const LOCKED_STOCK_RESTRICTION = 'LOCKED_STOCK_RESTRICTION';

    public const MAX_ORDER_QUANTITY = 'MAX_ORDER_QUANTITY';

    public const MIN_ORDER_QUANTITY = 'MIN_ORDER_QUANTITY';

    public const MULTIPLE_ORDER_OVER_QUANTITY = 'MULTIPLE_ORDER_OVER_QUANTITY';

    public const MULTIPLE_ORDER_QUANTITY = 'MULTIPLE_ORDER_QUANTITY';

    public const NEEDS_PAYMENTSYSTEM = 'NEEDS_PAYMENTSYSTEM';

    public const NEEDS_DELIVERY = 'NEEDS_DELIVERY';

    public const ON_REQUEST_PRODUCT = 'ON_REQUEST_PRODUCT';

    public const ORDER_APPROVAL_REQUIRED = 'ORDER_APPROVAL_REQUIRED';

    public const STOCK_PREVISION = 'STOCK_PREVISION';

    public const STOCK_RESTRICTION = 'STOCK_RESTRICTION';

    public const WAREHOUSE_OFFSET = 'WAREHOUSE_OFFSET';

    public const NOT_AVAILABLE_PRODUCT = 'NOT_AVAILABLE_PRODUCT';

    public const USER_NOT_VERIFIED = 'USER_NOT_VERIFIED';

    public const USER_NOT_ACTIVED = 'USER_NOT_ACTIVED';
}
