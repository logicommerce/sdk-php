<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\GeographicalZone;

/**
 * This is the Location class.
 * The location items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Location::getGeographicalZone()
 * @see Location::getCoordinate()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos
 */
class Location {
    use ElementTrait;

    protected ?GeographicalZone $geographicalZone = null;

    protected ?Coordinate $coordinate = null;

    /**
     * Returns the location coordinate.
     *
     * @return GeographicalZone|NULL
     */
    public function getGeographicalZone(): ?GeographicalZone {
        return $this->geographicalZone;
    }

    protected function setGeographicalZone(array $geographicalZone): void {
        $this->geographicalZone = new GeographicalZone($geographicalZone);
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
}
