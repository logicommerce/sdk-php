<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\OrderDetailType;

/**
 * This is the transaction document row class.
 * The transaction document rows will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ReturnProcessDocumentRow::getRmaReason()
 *
 * @see TransactionDocumentSingleRow
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
abstract class ReturnProcessDocumentRow extends TransactionDocumentSingleRow {
    use EnumResolverTrait;

    protected ?ReturnProcessDocumentRowRMAReason $rmaReason = null;

    /**
     * Returns the document row rmaReason.
     *
     * @return ReturnProcessDocumentRowRMAReason|NULL
     */
    public function getRmaReason(): ?ReturnProcessDocumentRowRMAReason {
        return $this->rmaReason;
    }

    protected function setRmaReason(array $rmaReason): void {
        $this->rmaReason = new ReturnProcessDocumentRowRMAReason($rmaReason);
    }
}
