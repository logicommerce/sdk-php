<?php

namespace SDK\Dtos\Basket\AppliedTaxes;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\AppliedTax;
use SDK\Dtos\Common\PluginAccountTax;

/**
 * This is the PluginAccount AppliedTax class.
 * The PluginAccount applied tax information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PluginAccount::getTax()
 * @see AppliedTax
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket\AppliedTaxes
 */
class PluginAccount extends AppliedTax {
    use ElementTrait;

    protected ?PluginAccountTax $tax = null;

    /**
     * Returns the applied tax object.
     *
     * @return PluginAccountTax|NULL
     */
    public function getTax(): ?PluginAccountTax {
        return $this->tax;
    }

    protected function setTax(array $tax): void {
        $this->tax = new PluginAccountTax($tax);
    }

}