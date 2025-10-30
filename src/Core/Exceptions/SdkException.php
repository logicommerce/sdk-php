<?php

namespace SDK\Core\Exceptions;

use SDK\Core\Dtos\Error;
use SDK\Core\Resources\Loggers\ExceptionLogger;

/**
 * This is the main SDK Exception class.
 *
 * All SDK exceptions extend this class.
 *
 * @abstract
 *
 * @throws Exception
 * @see Exception
 *
 * @package SDK\Core\Exceptions
 */
abstract class SdkException extends \Exception {

    private const UNEXPECTED_ERROR = 'F030-S000';

    private string $extendedCode;

    private Error $error;

    /**
     * Constructor.
     * Creates the exception.
     *
     * @param string $message
     *            The exception message
     * @param string $code
     *            The exception code
     * @param \Exception $previous
     *            The exception that precedes the current exception
     *
     * @see \Exception
     */
    public function __construct(string $message = null, string $code = '', \Exception $previous = null, ?Error $error = null) {
        if ($code === '') {
            $code = self::UNEXPECTED_ERROR;
        }
        if(is_null($error)){
            $error = new Error();
        }
        $this->error = $error;
        $this->extendedCode = $code;
        parent::__construct($message, (int) preg_replace('/\D/', '', $code), $previous);
        ExceptionLogger::getInstance()->error($this, $this->toArray());
    }

    /**
     * Auto-invoked using echo or concatenations.
     * Useful to log errors.
     *
     * @return string
     */
    public function __toString(): string {
        return __CLASS__ . ': [' . $this->extendedCode . ']: ' . $this->message;
    }

    public function getError(): Error {
        return $this->error;
    }

    private function toArray(): array {
        return [
            'class' => __CLASS__,
            'code' => $this->extendedCode,
            'file' => $this->file,
            'line' => $this->line,
            'error' => $this->error->toArray()
        ];
    }
}
