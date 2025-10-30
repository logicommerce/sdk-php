<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed doing a request.
 *
 * @package SDK\Core\Exceptions
 */
class RequestHandlerException extends SdkException {

    public const INVALID_URL = 'F030-R100';

    public const CURL_ERROR = 'F030-R101';
}
