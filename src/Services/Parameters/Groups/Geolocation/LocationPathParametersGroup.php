<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Geolocation;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Geolocation\LocationPathParametersValidator;

/**
 * This is the geolocation model (locations path resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Geolocation
 */
class LocationPathParametersGroup extends ParametersGroup {

    protected string $countryCode;

    protected int $locationId;

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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): LocationPathParametersValidator {
        return new LocationPathParametersValidator();
    }
}
