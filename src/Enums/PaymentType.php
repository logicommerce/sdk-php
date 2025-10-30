<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the payment types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PaymentType extends Enum {

    public const FORM = 'FORM';

    public const OFFLINE = 'OFFLINE';

    public const NO_PAY = 'NO_PAY';

    public const CASH_ON_DELIVERY = 'CASH_ON_DELIVERY';

    public const WIDGET = 'WIDGET';

    public const REDIRECT = 'REDIRECT';

}