<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the document row types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DocumentRowType extends Enum {

    public const PRODUCT = 'PRODUCT';

    public const GIFT = 'GIFT';

    public const BUNDLE = 'BUNDLE';

    public const LINKED = 'LINKED';

    public const VOUCHER_PURCHASE = 'VOUCHER_PURCHASE';

}
