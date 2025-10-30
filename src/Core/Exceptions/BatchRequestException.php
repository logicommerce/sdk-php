<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed doing a batch request.
 *
 * @package SDK\Core\Exceptions
 */
class BatchRequestException extends SdkException {

    public const IDENTIFIER_ALREADY_IN_USE = 'F030-B000';

    public const IDENTIFIER_REQUIRED = 'F030-B001';

    public const INVALID_REQUEST = 'F030-B002';

    public const INVALID_URL_PARAMS = 'F030-B003';

    public const INVALID_REQUEST_METHOD = 'F030-B004';
}
