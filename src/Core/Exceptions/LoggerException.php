<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed using a logger.
 *
 * @package SDK\Core\Exceptions
 */
class LoggerException extends SdkException {

    public const REQUIRED_CONSTANT = 'F030-L000';

    public const DUPLICATED_PARAMETER = 'F030-L001';

    public const REQUIRED_PARAMETER = 'F030-L002';

    public const LOGGING_ERROR = 'F030-L003';
}
