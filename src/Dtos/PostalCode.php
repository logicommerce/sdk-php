<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the Country Location settings class.
 * The locations will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PostalCode::getLocationId()
 * @see PostalCode::getPostalCode()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos
 */
class PostalCode extends Element {
    use ElementTrait, ElementNameTrait;

    protected int $locationId = 0;

    protected string $postalCode = '';

    /**
     * Returns the location internal identifier.
     *
     * @return int
     */
    public function getLocationId(): int {
        return $this->locationId;
    }

    /**
     * Returns the postal code.
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }
}
