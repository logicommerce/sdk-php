<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the AddressValidated main class.
 * The AddressValidated information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AddressValidated::getValid()
 * @see AddressValidated::getAddress()
 * @see AddressValidated::getValidAddresses()
 * @see AddressValidated::getMessages()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\User
 */
class AddressValidated extends Element {
    use ElementTrait;

    protected bool $valid = false;

    protected ?AddressValidate $address = null;

    protected array $validAddresses = [];

    protected array $messages = [];

    /**
     * Indicates whether the address is valid or not.
     * 
     * @return bool
     */
    public function getValid(): bool {
        return $this->valid;
    }

    /**
     * Returns the sended Address
     *
     * @return null|AddressValidate
     */
    public function getAddress(): ?AddressValidate {
        return $this->address;
    }

    protected function setAddress(array $addresses): void {
        $this->address = new AddressValidate($addresses);
    }

    /**
     * Returns the List of valid addresses.
     *
     * @return Address[]
     */
    public function getValidAddresses(): array {
        return $this->validAddresses;
    }

    protected function setValidAddresses(array $validAddresses): void {
        $this->validAddresses = $this->setArrayField($validAddresses, AddressValidate::class);
    }

    /**
     * Returns the messages value
     *
     * @return AddressValidatedMessage[]
     */
    public function getMessages(): array {
        return $this->messages;
    }

    protected function setMessages(array $messages): void {
        $this->messages = $this->setArrayField($messages, AddressValidatedMessage::class);
    }
}
