<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed on dynamic builders.
 *
 * @package SDK\Core\Exceptions
 */
class BuilderException extends SdkException {

    public const INVALID_CLASS = 'F030-B100';

    public const TOO_MANY_PARAMETERS = 'F030-B101';
}
