<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Geolocation;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Geolocation\LocalitiesParametersValidator;

/**
 * This is the geolocation model (localities resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Geolocation
 */
class LocalitiesParametersGroup extends ParametersGroup {

    protected string $countryCode;

    protected string $q;

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
     * Sets a search query parameter for this parameters group.
     *
     * @param string $q
     *
     * @return void
     */
    public function setQ(string $q): void {
        $this->q = $q;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): LocalitiesParametersValidator {
        return new LocalitiesParametersValidator();
    }
}
