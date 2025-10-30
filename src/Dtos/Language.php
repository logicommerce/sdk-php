<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the language settings class.
 * The languages will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Language::getCode()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos
 */
class Language extends Element {
    use ElementTrait, ElementNameTrait, IdentifiableElementTrait;

    protected string $code = '';

    /**
     * Returns the language ISO code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }
}
