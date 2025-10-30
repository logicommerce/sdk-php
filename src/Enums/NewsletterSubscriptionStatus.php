<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the Newsletter Subscription Status enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class NewsletterSubscriptionStatus extends Enum {

    public const SUBSCRIBED = 'SUBSCRIBED';

    public const UNSUBSCRIBED = 'UNSUBSCRIBED';

    public const ERROR = 'ERROR';
}
