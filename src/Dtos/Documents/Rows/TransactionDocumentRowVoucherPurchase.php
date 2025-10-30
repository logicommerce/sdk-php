<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rows\TransactionDocumentSingleRow;

/**
 * This is the transaction document  Voucher Purchase class.
 * The transaction document  Voucher Purchase will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TransactionDocumentSingleRow
 *
 * @package SDK\Dtos\Documents\Rows
 */
class TransactionDocumentRowVoucherPurchase extends TransactionDocumentSingleRow {
    use ElementTrait;

    protected array $vouchers = [];

    /**
     * Returns the vouchers.
     *
     * @return TransactionDocumentRowVoucherPurchaseVoucher[]
     */
    public function getVouchers(): array {
        return $this->vouchers; 
    }

    protected function setVouchers(array $vouchers): void {
        $this->vouchers = $this->setArrayField($vouchers, TransactionDocumentRowVoucherPurchaseVoucher::class);
    }   
}
