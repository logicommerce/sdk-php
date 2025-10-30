<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Transaction Document Row Voucher Purchase Voucher class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TransactionDocumentRowVoucherPurchaseVoucher::getVoucherCode()
 * @see TransactionDocumentRowVoucherPurchaseVoucher::getMessage()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class TransactionDocumentRowVoucherPurchaseVoucher extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected string $voucherCode = '';

    protected string $message = '';

    /**
     * Returns the voucherCode.
     * 
     * @return string
     */
    public function getVoucherCode(): string {
        return $this->voucherCode;
    }   

    /**
     * Returns the message.
     * 
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }
}
