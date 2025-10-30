<?php

namespace SDK\Dtos\Basket\BasketTaxes;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\BasketTax;

/**
 * This is the LogiCommerce BasketTax class.
 * The LogiCommerce basket tax information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketTax
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketTaxes
 */
class Logicommerce extends BasketTax {
    use ElementTrait;

}