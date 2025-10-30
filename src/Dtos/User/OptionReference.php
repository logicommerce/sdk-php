<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the option reference main class.
 * The option reference information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see OptionReference::getValues()
 *
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * 
 * @package SDK\Dtos\User
 */
class OptionReference extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected array $values = [];

    /**
     * Information about the option values. Contains the definition of all values. 
     * 
     * @return OptionReferenceValue[]
     */
    public function getValues(): array {
        return $this->values;
    }

    protected function setValues(array $values): void {
        $this->values = $this->setArrayField($values, OptionReferenceValue::class);
    }
}
