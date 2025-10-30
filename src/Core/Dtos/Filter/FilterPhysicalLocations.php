<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the FilterPhysicalLocations class.
 * The availables FilterPhysicalLocations of the current navigation items will be stored in that class and
 * will remain immutable (only get methods are available)
 *
 * @see FilterPhysicalLocations::getCountries()
 * @see FilterPhysicalLocations::getStates()
 * @see FilterPhysicalLocations::getCities()
 * @see FilterPhysicalLocations::getPostalCodes()
 *
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterPhysicalLocations extends Element {
    use ElementTrait;

    private array $countries = [];

    private array $states = [];

    private array $cities = [];

    private array $postalCodes = [];

    /**
     * Returns an array of FilterPhysicalLocationsOption.
     *
     * @return FilterPhysicalLocationsOption[]
     */
    public function getCountries(): array {
        return $this->countries;
    }

    private function setCountries(array $countries): void {
        $this->countries = $this->setArrayField($countries, FilterPhysicalLocationsCountry::class);
    }

    /**
     * Returns an array of FilterPhysicalLocationsState.
     *
     * @return array
     */
    public function getStates(): array {
        return $this->states;
    }

    private function setStates(array $states): void {
        $this->states = $states;
    }

    /**
     * Returns an array of FilterPhysicalLocationsCities.
     *
     * @return array
     */
    public function getCities(): array {
        return $this->cities;
    }

    private function setCities(array $cities): void {
        $this->cities = $cities;
    }

    /**
     * Returns an array of FilterPhysicalPostalCodes.
     *
     * @return array
     */
    public function getPostalCodes(): array {
        return $this->postalCodes;
    }

    private function setPostalCodes(array $postalCodes): void {
        $this->postalCodes = $postalCodes;
    }
}
