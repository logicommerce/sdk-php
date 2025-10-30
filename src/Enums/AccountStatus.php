<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

abstract class AccountStatus extends Enum {
    public const ENABLED = 'ENABLED';

    public const DISABLED = 'DISABLED';

    public const PENDING_VERIFICATION = 'PENDING_VERIFICATION';

    public const PENDING_MERCHANT_ACTIVATION = 'PENDING_MERCHANT_ACTIVATION';

    public const DENIED = 'DENIED';
}
