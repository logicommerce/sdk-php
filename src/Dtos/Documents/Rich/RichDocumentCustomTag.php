<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\CustomTagControlType;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the rich document custom tag class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentCustomTag::getName()
 * @see RichDocumentCustomTag::getValue()
 * @see RichDocumentCustomTag::getPosition()
 * @see RichDocumentCustomTag::getControlType()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentCustomTag extends Element{
    use ElementTrait, EnumResolverTrait;

    protected string $name = '';

    protected string $value = '';

    protected int $position = 0;

    protected string $controlType = '';

    /**
     * Returns the rich document custom tag name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }


    /**
     * Returns the rich document custom tag value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the rich document custom tag control type.
     *
     * @return string
     */
    public function getControlType(): string { // ENUM
        return $this->getEnum(CustomTagControlType::class, $this->controlType, CustomTagControlType::SHORT_TEXT);
    }

    /**
     * Returns the rich document position value.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

}
