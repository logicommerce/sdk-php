<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the Custom Tag Value class.
 * The custom tags values information of API elements will be stored in that class and will remain immutable
 * (only get methods are available)
 *
 * @see CustomTagValue::getCustomTagId()
 * @see CustomTagValue::getValue()
 * @see CustomTagValue::getValues()
 * @see CustomTagValue::getImage()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Core\Dtos
 */
class CustomTagValue {
    use ElementTrait, ElementNameTrait;

    protected int $customTagId = 0;

    protected int $position = 0;

    protected string $value = '';

    protected string $customTagPId = '';

    protected array $values = [];

    protected string $image = '';

    /**
     * Returns the custom tag internal identifier.
     *
     * @return int
     */
    public function getCustomTagId(): int {
        return $this->customTagId;
    }

    /**
     * Returns the custom tag position.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Returns the single value of the custom tag (used by all control types except MULTIPLE_SELECTION and MULTIPLE_SELECTION_IMAGE).
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the custom tag public identifier.
     *
     * @return string
     */
    public function getCustomTagPId(): string {
        return $this->customTagPId;
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
}
