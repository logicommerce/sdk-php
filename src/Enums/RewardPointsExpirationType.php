<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the reward points expiration type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class RewardPointsExpirationType extends Enum {

    public const BY_DATE = 'BY_DATE';

    public const BY_DAYS = 'BY_DAYS';

    public const BY_UPDATED_DAYS = 'BY_UPDATED_DAYS';

}
