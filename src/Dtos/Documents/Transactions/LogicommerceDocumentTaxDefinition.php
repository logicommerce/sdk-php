<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the logi commerce document tax definition class.
 * The document tax definitions will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see LogicommerceDocumentTaxDefinition::getTaxId()
 * @see LogicommerceDocumentTaxDefinition::getReRate()
 * @see LogicommerceDocumentTaxDefinition::getRePrice()
 *
 * @see DocumentTaxDefinition
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
class LogicommerceDocumentTaxDefinition extends DocumentTaxDefinition {
    use ElementTrait;

    protected int $taxId = 0;

    protected float $reRate = 0.0;

    protected float $rePrice = 0.0;

    /**
     * Returns internal identifier of the tax.
     *
     * @return int
     */
    public function getTaxId(): int {
        return $this->taxId;
    }

    /**
     * Returns sales equalization tax.
     *
     * @return float
     */
    public function getReRate(): float {
        return $this->reRate;
    }

    /**
     * Returns amount due to the application of the sales equalization tax.
     *
     * @return float
     */
    public function getRePrice(): float {
        return $this->rePrice;
    }
}
