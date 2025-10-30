<?php

namespace SDK\Enums;

use SDK\Core\Enums\EnumList;

/**
 * This is the add products mode enumerate.
 *
 * @see EnumList
 *
 * @package SDK\Enums
 */
abstract class AccountRegisteredUserStatus extends EnumList {

    public const ENABLED = 'ENABLED';

    public const DISABLED = 'DISABLED';

    public const PENDING_APPROVAL = 'PENDING_APPROVAL';
}
