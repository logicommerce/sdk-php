<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Coordinate;

/**
 * This is the rich location class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichLocation::getCoordinate()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichLocation extends Element {
    use ElementTrait;

    protected ?Coordinate $coordinate = null;

    protected string $countryName = '';

    /**
     * Returns the rich location coordinate.
     *
     * @return Coordinate|NULL
     */
    public function getCoordinate(): ?Coordinate {
        return $this->coordinate;
    }

    protected function setCoordinate(array $coordinate): void {
        $this->coordinate = new Coordinate($coordinate);
    }

    /**
     * Returns the rich location countryName.
     * 
     * @return string
     */
    public function getCountryName(): string {
        return $this->countryName;
    }
}
