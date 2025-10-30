<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the geographical zone class.
 * The basket geographical zones information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see GeographicalZone::getCountryCode()
 * @see GeographicalZone::getLocationId()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class GeographicalZone {
    use ElementTrait;

    protected string $countryCode = '';

    protected int $locationId = 0;

    /**
     * Returns the geographical zone country ISO code.
     *
     * @return string
     */
    public function getCountryCode(): string {
        return $this->countryCode;
    }

    /**
     * Returns the geographical zone Location internal id.
     *
     * @return int
     */
    public function getLocationId(): int {
        return $this->locationId;
    }
}
