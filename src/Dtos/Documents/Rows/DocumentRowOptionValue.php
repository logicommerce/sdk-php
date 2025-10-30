<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the document row option value class.
 * The document row option values will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentRowOptionValue::getValue()
 * @see DocumentRowOptionValue::getOptionValueId()
 * @see DocumentRowOptionValue::getOptionValuePId()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
class DocumentRowOptionValue extends Element {
    use ElementTrait, IdentifiableElementTrait;
    
    protected string $value = "";

    protected int $optionValueId = 0;

    protected string $optionValuePId = "";

    /**
     * Returns option value for the returned language.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns internal identifier of the option value.
     *
     * @return int
     */
    public function getOptionValueId(): int {
        return $this->optionValueId;
    }

    /**
     * Returns public identifier of the option value.
     *
     * @return string
     */
    public function getOptionValuePId(): string {
        return $this->optionValuePId;
    }
}
