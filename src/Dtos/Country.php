<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\PostalCodeType;

/**
 * This is the country class.
 * The countries will be stored in that class and will remain immutable (only get methods are available)
 *
 *  @see Country::getDefaultLanguage()
 *  @see Country::getCode()
 *  @see Country::getNumeric()
 *  @see Country::getPostalCodeType()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses ElementNameTrait
 * @uses EnumResolverTrait
 * @uses IdentifiableElementTrait
 *
 * @package SDK\Dtos
 */
class Country extends Element {
    use ElementTrait, ElementNameTrait, EnumResolverTrait, IdentifiableElementTrait;

    protected string $code = '';

    protected int $numeric = 0;

    protected string $postalCodeType = '';

    protected int $defaultLanguage = 0;

    /**
     * Returns the element defaultLanguage.
     *
     * @return int
     */
    public function getDefaultLanguage(): int {
        return $this->defaultLanguage;
    }

    /**
     * Returns the country code in ISO 3166-2 format.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns the country numeric code in ISO 3166-1 format
     *
     * @return int
     */
    public function getNumeric(): int {
        return $this->numeric;
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
