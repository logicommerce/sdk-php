<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

/**
 * This is the Incidence Save For Later List Row Collection class
 *
 * @see CountryCurrenciesCollection::getCountries()
 *
 * @see ElementCollection
 *
 * @package SDK\Core\Dtos
 */
class CountryCurrenciesCollection extends ElementCollection {

    protected array $countries = [];

    /**
     * Returns the countries.
     *
     * @return countriesaveForLaterListRow[]
     */
    public function getCountries(): array {
        return $this->countries;
    }

    protected function setCountries(array $countries): void {
        $this->countries = $this->setArrayField($countries, CountryCurrencies::class);
    }
}
