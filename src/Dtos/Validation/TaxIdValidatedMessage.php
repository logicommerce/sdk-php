<?php

namespace SDK\Dtos\Validation;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the TaxIdValidatedMessage main class.
 * The TaxIdValidatedMessage information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TaxIdValidatedMessage::getCode()
 * @see TaxIdValidatedMessage::getMessage()
 * @see TaxIdValidatedMessage::getDetail()
 *
 * @see Element
 *
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Validation
 */
class TaxIdValidatedMessage extends Element {
    use ElementTrait;

    protected string $code = '';

    protected string $message = '';

    protected string $detail = '';

    /**
     * Returns the code value
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns the message value
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Returns the detail value
     *
     * @return string
     */
    public function getDetail(): string {
        return $this->detail;
    }
}
