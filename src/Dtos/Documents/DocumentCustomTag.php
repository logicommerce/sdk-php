<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Enums\CustomTagControlType;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the document custom tag class.
 * The document custom tag will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AbstractDocumentCustomTag::getCustomTagId()
 * @see AbstractDocumentCustomTag::getValue()
 * @see AbstractDocumentCustomTag::getControlType()
 * @see AbstractDocumentCustomTag::getPosition()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents
 */
class DocumentCustomTag extends Element {
    use ElementTrait, ElementNameTrait, EnumResolverTrait;

    protected int $customTagId = 0;

    protected string $value = '';

    protected string $controlType = '';

    protected int $position = 0;

    /**
     * Returns the document custom tag internal identifier.
     *
     * @return int
     */
    public function getCustomTagId(): int {
        return $this->customTagId;
    }

    /**
     * Returns the document custom tag value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the custom tag control type.
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
