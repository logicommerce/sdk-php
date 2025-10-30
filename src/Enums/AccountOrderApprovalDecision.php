<?php

namespace SDK\Enums;

use SDK\Core\Enums\EnumList;

/**
 * This is the account order approval decision enumerate.
 *
 * @package SDK\Enums
 */
abstract class AccountOrderApprovalDecision extends EnumList {

    public const APPROVE = 'APPROVE';

    public const REJECT = 'REJECT';
}
