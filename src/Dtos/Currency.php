<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the currency settings class.
 * The currencies will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Currency::getCode()
 * @see Currency::getName()
 * @see Currency::getSymbol()
 * @see Currency::getUSDValue()
 * @see Currency::getCodeNumber()
 *
 * @uses ElementTrait
 * @uses ElementNameTrait
 * @uses IdentifiableElementTrait
 *
 * @package SDK\Dtos
 */
class Currency extends Element {
    use ElementTrait, ElementNameTrait, IdentifiableElementTrait;

    protected string $code = '';

    protected string $symbol = '';

    protected float $USDValue = 0.00;

    protected string $codeNumber = '';

    /**
     * Returns the currency code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns the currency symbol.
     *
     * @return string
     */
    public function getSymbol(): string {
        return $this->symbol;
    }

    /**
     * Returns the currency usd value.
     *
     * @return float
     */
    public function getUSDValue(): float {
        return $this->USDValue;
    }

    /**
     * Returns the currency iso code.
     *
     * @return string
     */
    public function getCodeNumber(): string {
        return $this->codeNumber;
    }
}
