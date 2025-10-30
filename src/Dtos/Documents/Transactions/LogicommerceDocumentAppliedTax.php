<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\DocumentItemTax;

/**
 * This is the logi commerce document applied tax class.
 * The document applied taxes will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see LogicommerceDocumentAppliedTax::getTax()
 * @see LogicommerceDocumentAppliedTax::getApplyRe()
 *
 * @see DocumentAppliedTax
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
class LogicommerceDocumentAppliedTax extends DocumentAppliedTax {
    use ElementTrait;

    protected bool $applyRe = false;

    protected ?DocumentItemTax $tax = null;

    /**
     * Returns whether a sales equalization tax is included in the tax applied.
     *
     * @return bool
     */
    public function getApplyRe(): bool {
        return $this->applyRe;
    }

    /**
     * Returns information about the applied tax.
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
