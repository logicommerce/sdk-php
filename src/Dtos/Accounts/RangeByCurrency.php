<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the range by currency main class.
 * The range by currency information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see RangeByCurrency::getCurrencyCode()
 * @see RangeByCurrency::getMin()
 * @see RangeByCurrency::getMax()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Accounts
 */
class RangeByCurrency extends Element {

    use ElementTrait {
        __construct as superConstruct;
    }

    protected string $currencyCode = '';
    protected float $min = 0.0;
    protected float $max = 0.0;

    /**
     * Returns the currency code.
     * 
     * @return string
     */
    public function getCurrencyCode(): string {
        return $this->currencyCode;
    }

    protected function setCurrencyCode(string $currencyCode): void {
        $this->currencyCode = $currencyCode;
    }

    /**
     * Returns the min.
     * 
     * @return float
     */
    public function getMin(): float {
        return $this->min;
    }

    protected function setMin(float $min): void {
        $this->min = $min;
    }

    /**
     * Returns the max.
     * 
     * @return float
     */
    public function getMax(): float {
        return $this->max;
    }

    protected function setMax(float $max): void {
        $this->max = $max;
    }
}
