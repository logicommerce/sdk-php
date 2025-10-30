<?php

namespace SDK\Dtos\Basket\BasketRows;

/**
 * This is the basket voucher purchase class.
 * The basket voucher purchase information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Product
 *
 * @package SDK\Dtos\Basket\BasketRows
 */
class VoucherPurchase extends Product {

    protected array $recipients = [];

    /**
     * Returns the recipients.
     *
     * @return VoucherPurchaseRecipient[]
     */
    public function getRecipients(): array {
        return $this->recipients; 
    }

    protected function setRecipients(array $recipients): void {
        $this->recipients = $this->setArrayField($recipients, VoucherPurchaseRecipient::class);
    }
}
