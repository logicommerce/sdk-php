<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the HttpStatus class.
 * The needed data will be stored here and remain immutable (only get methods are available)
 *
 * @see HttpStatus::getCode()
 * @see HttpStatus::getMessage()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class HttpStatus extends Element {
    use ElementTrait;

    protected int $code = 0;

    protected string $message = '';

    /**
     * Returns the HTTP status code.
     *
     * @return int
     */
    public function getCode(): int {
        return $this->code;
    }

    /**
     * Returns the HTTP status message.
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }
}
