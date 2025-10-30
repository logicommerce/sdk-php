<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the license parameter class.
 * The license parameter will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see LicenseParameter::getValue()
 *
 * @uses ElementTrait
 * @uses ElementNameTrait
 *
 * @package SDK\Dtos
 */
class LicenseParameter extends Element {
    use ElementTrait, ElementNameTrait;

    protected string $value = '';

    /**
     * Returns the value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

}
