<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Custom Tag Selectable Value class.
 * The custom tags selectable values information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CustomTagSelectableValue::getValue()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Core\Dtos
 */
class CustomTagSelectableValue {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected string $value = '';

    /**
     * Returns the custom tag value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }
}
