<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the order statuses enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class OrderStatus extends Enum {

    public const DENIED = 'DENIED';

    public const INCIDENTS = 'INCIDENTS';

    public const INCOMING = 'INCOMING';

    public const IN_PROCESS = 'IN_PROCESS';

    public const COMPLETED = 'COMPLETED';

    public const DELETED = 'DELETED';

    public const CONFIRM_DELETED = 'CONFIRM_DELETED';

    public const PENDING_APPROVAL = 'PENDING_APPROVAL';

    public static function getServiceValidStatuses(): array {
        return [
            self::INCOMING,
            self::IN_PROCESS,
            self::COMPLETED,
            self::PENDING_APPROVAL,
        ];
    }
}
