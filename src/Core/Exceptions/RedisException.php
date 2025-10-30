<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed on the Redis class.
 *
 * @package SDK\Core\Exceptions
 */
class RedisException extends SdkException {

    public const COMMERCE_ID_NOT_DEFINED = 'F030-R100';

    public const UNABLE_TO_USE_REDIS = 'F030-R100';
}
