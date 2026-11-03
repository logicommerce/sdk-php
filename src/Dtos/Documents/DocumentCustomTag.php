<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\CustomTagSelectedValue;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\CdnImageTrait;
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
 * @see AbstractDocumentCustomTag::getValues()
 * @see AbstractDocumentCustomTag::getImage()
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
    use ElementTrait, ElementNameTrait, EnumResolverTrait, CdnImageTrait;

    protected int $customTagId = 0;

    protected string $value = '';

    protected string $controlType = '';

    protected int $position = 0;

    protected array $values = [];

    protected string $image = '';

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
     * Returns the selected values for multi-selection custom tags (MULTIPLE_SELECTION, MULTIPLE_SELECTION_IMAGE).
     * Empty for single-value control types.
     *
     * @return CustomTagSelectedValue[]
     */
    public function getValues(): array {
        return $this->values;
    }

    protected function setValues(array $values): void {
        $this->values = $this->setArrayField($values, CustomTagSelectedValue::class);
    }

    /**
     * Returns the image path associated with single image-selection control types (SINGLE_SELECTION_IMAGE).
     * Empty for non-image control types.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
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
