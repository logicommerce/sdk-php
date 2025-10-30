<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the document additional information class.
 * The additional information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentAdditionalInformation::getValue()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
class DocumentAdditionalInformation extends Element {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait;

    protected string $value = '';

    /**
     * Returns the value of the additional information field.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }
}
