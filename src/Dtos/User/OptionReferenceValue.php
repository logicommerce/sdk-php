<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the option reference value main class.
 * The option reference value information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see OptionReferenceValue::getValue()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 *
 * @package SDK\Dtos\User
 */
class OptionReferenceValue extends Element {
    use ElementTrait;

    protected string $value = '';

    /**
     * 
     * Information about the option values. Contains the definition of all values. 
     * 
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }
}
