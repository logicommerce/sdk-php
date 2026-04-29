<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Custom Tag Selected Value class.
 * Represents a single selected value on a product/document for multi-selection custom tags
 * (MULTIPLE_SELECTION, MULTIPLE_SELECTION_IMAGE).
 *
 * @see CustomTagSelectedValue::getValue()
 * @see CustomTagSelectedValue::getImage()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Core\Dtos
 */
class CustomTagSelectedValue {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected string $value = '';

    protected string $image = '';

    /**
     * Returns the selected value text.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the image path associated with this selected value (empty for non-image selections).
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }
}
