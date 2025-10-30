<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed preparing a request.
 *
 * @package SDK\Core\Exceptions
 */
class RequestException extends SdkException {

    public const INVALID_METHOD = 'F030-R000';

    public const INVALID_PARAMETERS = 'F030-R001';
}
