<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed doing a request to the API.
 *
 * @package SDK\Core\Exceptions
 */
class ApiRequestException extends SdkException {

    public const INVALID_URL = 'F030-A000';

    public const INVALID_RESULT = 'F030-A001';
}
