<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Country Location settings class.
 * The locations will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CountryLocation::getLocationId()
 * @see CountryLocation::getValue()
 * @see CountryLocation::getLevel()
 * @see CountryLocation::getCoordinate()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos
 */
class CountryLocation extends Element {
    use ElementTrait;

    protected int $locationId = 0;

    protected string $value = '';

    protected int $level = 0;

    protected ?Coordinate $coordinate = null;

    protected string $ISOCode = '';

    /**
     * Returns the location internal identifier.
     *
     * @return int
     */
    public function getLocationId(): int {
        return $this->locationId;
    }

    /**
     * Returns the location value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the location level.
     *
     * @return int
     */
    public function getLevel(): int {
        return $this->level;
    }

    /**
     * Returns the location coordinate.
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
     * Returns the location ISOCode.
     *
     * @return string
     */
    public function getISOCode(): string {
        return $this->ISOCode;
    }
}
