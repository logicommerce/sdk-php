<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the master type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class MasterType extends Enum {

    public const EMPLOYEE = 'EMPLOYEE';

    public const ACCOUNT_REGISTERED_USER = 'ACCOUNT_REGISTERED_USER';
}
