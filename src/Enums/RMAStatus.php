<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the document status enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class RMAStatus extends Enum {

    public const INCIDENTS = 'INCIDENTS';

    public const PENDING = 'PENDING';

    public const AUTHORIZED = 'AUTHORIZED';

    public const NO_AUTHORIZED = 'NO_AUTHORIZED';

    public const IN_PROCESS = 'IN_PROCESS';

    public const ACCEPTED = 'ACCEPTED';

    public const DENIED = 'DENIED';

    public const COMPLETED = 'COMPLETED';

    public const DELETED = 'DELETED';
}