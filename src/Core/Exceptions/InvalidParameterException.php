<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed trying to manipulate pseudo-private attributes on s.
 *
 * @package SDK\Core\Exceptions
 */
class InvalidParameterException extends SdkException {

    public const PARAMETER_REQUIRED = 'S130I00001';

    public const INVALID_PARAMETER_VALUE = 'S130I00002';

    public const INVALID_PARAMETER = 'S130I00003';

    public const REDIS_HOST = 'S130I00004';

    public const VINCULATED_PARAMETER_REQUIRED = 'S130I00005';
}
