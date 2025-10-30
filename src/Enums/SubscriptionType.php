<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the subscription type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class SubscriptionType extends Enum {

    public const BLOG = 'BLOG';

    public const STOCK_ALERT = 'STOCK_ALERT';
}
