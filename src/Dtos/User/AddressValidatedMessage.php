<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the AddressValidatedMessage main class.
 * The AddressValidatedMessage information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AddressValidatedMessage::getDetail()
 * @see AddressValidatedMessage::getMessage()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\User
 */
class AddressValidatedMessage extends Element {
    use ElementTrait;

    protected string $message = '';

    protected string $detail = '';

    /**
     * Returns the detail value
     * 
     * @return string
     */
    public function getDetail(): string {
        return $this->detail;
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
