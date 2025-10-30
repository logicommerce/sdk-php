<?php

namespace SDK\Core\Exceptions;

use SDK\Core\Dtos\Error;

/**
 * This is the Exception class for errors throwed when API recovered data is a error.
 *
 * @package SDK\Core\Exceptions
 */
class ConnectionException extends SdkException {

    public const CONNECTION_ERROR = 'F030-C000';

    private Error $error;

    /**
     * Constructor. Creates the exception.
     *
     * @param Error $error
     *            The error that has thrown the exception
     *
     * @see Error
     */
    public function __construct(Error $error) {
        $this->error = $error;
        parent::__construct($error->getMessage(), (int)preg_replace('/\D/', '', $error->getCode()), null);
    }

    /**
     * Returns the exception error.
     *
     * @return Error
     */
    public function getError(): Error {
        return $this->error;
    }
}
