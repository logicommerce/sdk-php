<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document additional information class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentAdditionalInformation::getId()
 * @see RichDocumentAdditionalInformation::getName()
 * @see RichDocumentAdditionalInformation::getValue()
 * 
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentAdditionalInformation extends Element{
    use ElementTrait;

    protected int $id = 0;

    protected string $name = '';

    protected string $value = '';

    /**
     * Returns the rich document additional information id.
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Returns the rich document additional information name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the rich document additional information value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

}
