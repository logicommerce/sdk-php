<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the payment status enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PaymentStatus extends Enum {

    public const OK = 'OK';

    public const KO = 'KO';

}