<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the payment validate status enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PaymentValidateStatus extends Enum {

    public const ACCEPTED = 'ACCEPTED';

    public const VALIDATED = 'VALIDATED';

    public const OK = 'OK';

    public const KO = 'KO';

    public const SKIP = 'SKIP';

}