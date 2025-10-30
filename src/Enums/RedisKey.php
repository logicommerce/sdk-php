<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the Redis key enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class RedisKey extends Enum {

    public const TOKEN = 'TOKEN';

    public const SESSION = 'SESSION';

    public const OBJECT = 'OBJECT';

}
