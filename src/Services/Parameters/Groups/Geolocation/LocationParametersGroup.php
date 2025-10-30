<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Geolocation;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Geolocation\LocationParametersValidator;

/**
 * This is the geolocation model (locations resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Geolocation
 */
class LocationParametersGroup extends ParametersGroup {

    protected string $languageCode;

    protected string $countryCode;

    protected int $parentId;

    /**
     * Sets the language ISO code parameter for this parameters group.
     *
     * @param string $languageCode
     *
     * @return void
     */
    public function setLanguageCode(string $languageCode): void {
        $this->languageCode = $languageCode;
    }

    /**
     * Sets the country ISO code parameter for this parameters group.
     *
     * @param string $countryCode
     *
     * @return void
     */
    public function setCountryCode(string $countryCode): void {
        $this->countryCode = $countryCode;
    }

    /**
     * Sets the parent internal identifier parameter for this parameters group.
     *
     * @param int $parentId
     *
     * @return void
     */
    public function setParentId(int $parentId): void {
        $this->parentId = $parentId;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): LocationParametersValidator {
        return new LocationParametersValidator();
    }
}
