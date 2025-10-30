<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the user key criteria enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class UserKeyCriteria extends Enum {

    public const PID = 'PID';

    public const EMAIL = 'EMAIL';

    public const USERNAME = 'USERNAME';
}
