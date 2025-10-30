<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Custom Tag class.
 * The custom tags information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CountryCurrencies::getCurrencyCodes()
 * @see CountryCurrencies::getCountryCode()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class CountryCurrencies extends Element {
    use ElementTrait;

    protected string $countryCode = '';

    protected array $currencyCodes = [];

    /**
     * Returns if the countryCode.
     *
     * @return string
     */
    public function getCountryCode(): string {
        return $this->countryCode;
    }

    /**
     * Returns the currencyCodes.
     *
     * @return array
     */
    public function getCurrencyCodes(): array {
        return $this->currencyCodes;
    }
}
