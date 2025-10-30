<?php

namespace SDK\Dtos\Documents\Rich\RichDocumentElementTaxes;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\DocumentItemTax;
use SDK\Dtos\Documents\Rich\RichDocumentElementTax;

/**
 * This is the LogiCommerce RichDocumentElementTax class.
 * It is used to store the LogiCommerce rich document element tax information.
 *
 * @see Logicommerce::getApplyRE()
 * @see Logicommerce::getTax()
 * 
 * @see RichDocumentElementTax
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich\RichDocumentElementTaxes
 */
class Logicommerce extends RichDocumentElementTax {
    use ElementTrait;

    protected ?DocumentItemTax $tax = null;

    /**
     * Returns the rich document element tax tax.
     *
     * @return DocumentItemTax|NULL
     */
    public function getTax(): ?DocumentItemTax {
        return $this->tax;
    }

    protected function setTax(array $tax): void {
        $this->tax = new DocumentItemTax($tax);
    }

}