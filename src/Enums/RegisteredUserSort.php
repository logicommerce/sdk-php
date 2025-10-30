<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort registered user value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class RegisteredUserSort extends SortableEnum {

    public const ID = 'ID';

    public const FIRSTNAME = 'FIRSTNAME';

    public const LASTNAME = 'LASTNAME';

    public const EMAIL = 'EMAIL';

    public const USERNAME = 'USERNAME';

    public const PID = 'PID';

    public const DATEADDED = 'DATEADDED';
}
