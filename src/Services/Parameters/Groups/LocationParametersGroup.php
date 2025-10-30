<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\LocationParametersValidator;

/**
 * This is the location parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class LocationParametersGroup extends ParametersGroup {

    protected string $countryCode;

    protected int $locationId;

    protected CoordinateParametersGroup $coordinate;

    /**
     * Sets the country ISO identifier parameter for this parameters group.
     *
     * @param string $countryCode
     *
     * @return void
     */
    public function setCountryCode(string $countryCode): void {
        $this->countryCode = $countryCode;
    }

    /**
     * Gets the country ISO identifier parameter for this parameters group.
     *
     * @return string
     */
    public function getCountryCode(): string {
        return $this->countryCode;
    }

    /**
     * Sets the Location internal identifier parameter for this parameters group.
     *
     * @param int $locationId
     *
     * @return void
     */
    public function setLocationId(int $locationId): void {
        $this->locationId = $locationId;
    }

    /**
     * Sets the coordinate parameter for this parameters group.
     *
     * @param CoordinateParametersGroup $coordinate
     *
     * @return void
     */
    public function setCoordinate(CoordinateParametersGroup $coordinate): void {
        $this->coordinate = $coordinate;
    }

    protected function getValidator(): LocationParametersValidator {
        return new LocationParametersValidator();
    }
}
