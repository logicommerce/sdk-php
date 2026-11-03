<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\CdnImageTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Custom Tag Selectable Value class.
 * The custom tags selectable values information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CustomTagSelectableValue::getValue()
 * @see CustomTagSelectableValue::getImage()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Core\Dtos
 */
class CustomTagSelectableValue {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, CdnImageTrait;

    protected string $value = '';

    protected string $image = '';

    /**
     * Returns the custom tag value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the image path associated with this selectable value.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }
}
