<?php

namespace SDK\Dtos\Basket\BasketRows;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the basket product voucher purchase recipient class.
 *
 * @see VoucherPurchaseRecipient::getEmail()
 *
 * @see VoucherPurchaseRecipient::getMessage()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketRows
 */
class VoucherPurchaseRecipient extends Element {
    use ElementTrait;

    protected string $email = '';

    protected string $message = '';


    /**
     * Returns the email address.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
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
