<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the reward points rule type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class RewardPointsRuleType extends Enum {

    public const REGISTER = 'REGISTER';

    public const COMMENT = 'COMMENT';

    public const BY_UNITS = 'BY_UNITS';

    public const BY_AMOUNT = 'BY_AMOUNT';

    public const REDEEM = 'REDEEM';

    public const ORDER_RELEASE = 'ORDER_RELEASE';

    public const MANUAL = 'MANUAL';


}
