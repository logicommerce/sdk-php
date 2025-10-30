<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed on the Application class.
 *
 * @package SDK\Core\Exceptions
 */
class ApplicationException extends SdkException {

    public const COMMERCE_ID_NOT_DEFINED = 'F030-A100';

    public const COULD_NOT_RETRIEVE_SETTINGS = 'F030-A101';
}
