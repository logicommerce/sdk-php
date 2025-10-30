<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the product type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class ProductType extends Enum {

    public const PRODUCT = 'PRODUCT';

    public const VOUCHER_PURCHASE = 'VOUCHER_PURCHASE';

}
