<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the reward points rule value mode enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class RewardPointsRuleValueMode extends Enum {

    public const FROM = 'FROM';

    public const RANGE = 'RANGE';

    public const EACH = 'EACH';

}
