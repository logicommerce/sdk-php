<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\PostalCodeType;

/**
 * This is the FilterPhysicalLocationsCountry class.
 * The availables FilterPhysicalLocationsCountry of the current navigation items will be stored in that class and
 * will remain immutable (only get methods are available)
 *
 * @see FilterPhysicalLocationsCountry::getCode()
 * @see FilterPhysicalLocationsCountry::getNumeric()
 * @see FilterPhysicalLocationsCountry::getName()
 * @see FilterPhysicalLocationsCountry::getPostalCodeType()
 *
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterPhysicalLocationsCountry {
    use ElementTrait, EnumResolverTrait;

    private string $code = '';

    private int $numeric = 0;

    private string $name = '';

    private string $postalCodeType = '';

    /**
     * Returns the code
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns the numeric
     *
     * @return int
     */
    public function getNumeric(): int {
        return $this->numeric;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the country postal code type.
     *
     * @return string
     */
    public function getPostalCodeType(): string { // ENUM
        return $this->getEnum(PostalCodeType::class, $this->postalCodeType, PostalCodeType::STATE_CITY_POSTAL_CODE);
    }
}
