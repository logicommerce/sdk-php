<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Error class.
 * If the API returns an error it will be stored here and remain immutable (only get methods are available)
 *
 * @see Error::getReference()
 * @see Error::getStatus()
 * @see Error::getCode()
 * @see Error::getMessage()
 * @see Error::getFields()
 * 
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class Error extends Element {
    use ElementTrait;

    protected string $reference = '';

    protected int $status = 0;

    protected string $statusMessage = '';

    protected string $code = '';

    protected string $message = '';

    protected array $fields = [];

    /**
     * Returns the Error reference.
     *
     * @return string
     */
    public function getReference(): string {
        return $this->reference;
    }

    /**
     * Returns the Error status.
     *
     * @return int
     */
    public function getStatus(): int {
        return $this->status;
    }

    /**
     * Returns the Error status message.
     *
     * @return string
     */
    public function getStatusMessage(): string {
        return $this->statusMessage;
    }

    /**
     * Returns the Error code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns the Error message.
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Returns the fields where there is an error.
     *
     * @return ErrorField[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    protected function setFields(array $fields): void
    {
        $this->fields = $this->setArrayField($fields, ErrorField::class);
    }
}
