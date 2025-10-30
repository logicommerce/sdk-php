<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the detail main class.
 * The detail information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Detail::getReference()
 * @see Detail::getStatus()
 * @see Detail::getCode()
 * @see Detail::getStackTrace()
 * @see Detail::getMessage()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class Detail {
    use ElementTrait;

    protected string $reference = '';

    protected string $status = '';

    protected string $code = '';

    protected string $stackTrace = '';

    protected string $message = '';


    /**
     * Returns the reference value
     * 
     * @return string
     */
    public function getReference(): string {
        return $this->reference;
    }

    /**
     * Returns the status value
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * Returns the code value
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns the stackTrace value
     *
     * @return string
     */
    public function getStackTrace(): string {
        return $this->stackTrace;
    }

    /**
     * Returns the message value
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

}