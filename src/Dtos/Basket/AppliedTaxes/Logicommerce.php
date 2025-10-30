<?php

namespace SDK\Dtos\Basket\AppliedTaxes;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\AppliedTax;
use SDK\Dtos\Common\Tax;

/**
 * This is the LogiCommerce AppliedTax class.
 * The LogiCommerce applied tax information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Logicommerce::getTax()
 * @see AppliedTax
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket\AppliedTaxes
 */
class Logicommerce extends AppliedTax {
    use ElementTrait;

    protected ?Tax $tax = null;

    /**
     * Returns the applied tax object.
     *
     * @return Tax|NULL
     */
    public function getTax(): ?Tax {
        return $this->tax;
    }

    protected function setTax(array $tax): void {
        $this->tax = new Tax($tax);
    }

}