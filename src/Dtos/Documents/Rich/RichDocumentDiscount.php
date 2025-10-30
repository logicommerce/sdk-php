<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document discount class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentDiscount::getName()
 * @see RichDocumentDiscount::getDescription()
 * @see RichDocumentDiscount::getValue()
 * @see RichDocumentDiscount::getValueWithTaxes()
 * 
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentDiscount extends Element{
    use ElementTrait;

    protected string $name = '';

    protected string $description = '';

    protected string $value = '';

    protected string $valueWithTaxes = '';

    /**
     * Returns the rich document discount name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the rich document discount description.
     *
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * Returns the rich document discount value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the rich document discount valueWithTaxes.
     *
     * @return string
     */
    public function getValueWithTaxes(): string {
        return $this->valueWithTaxes;
    }

}
