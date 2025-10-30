<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Coordinate class.
 * The coordinate items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Coordinate::getLatitude()
 * @see Coordinate::getLongitude()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos
 */
class Coordinate {
    use ElementTrait;

    protected float $latitude = 0.00;

    protected float $longitude = 0.00;

    /**
     * Returns the coordinate latitude value.
     *
     * @return float
     */
    public function getLatitude(): float {
        return $this->latitude;
    }

    /**
     * Returns the coordinate longitude value.
     *
     * @return float
     */
    public function getLongitude(): float {
        return $this->longitude;
    }
}
