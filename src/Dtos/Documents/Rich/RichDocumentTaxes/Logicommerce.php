<?php

namespace SDK\Dtos\Documents\Rich\RichDocumentTaxes;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rich\RichDocumentTax;

/**
 * This is the LogiCommerce RichDocumentTax class.
 * It is used to store the LogiCommerce rich document tax information.
 *
 * @see Logicommerce::getReRate()
 * @see Logicommerce::getRePrice()
 * 
 * @see RichDocumentTax
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich\RichDocumentTaxes
 */
class Logicommerce extends RichDocumentTax {
    use ElementTrait;

    protected float $reRate = 0.0;
    
    protected string $rePrice = '';

    /**
     * Returns the rich document tax reRate.
     *
     * @return float
     */
    public function getReRate(): float {
        return $this->reRate;
    }

    /**
     * Returns the rich document tax rePrice.
     *
     * @return string
     */
    public function getRePrice(): string {
        return $this->rePrice;
    }

}