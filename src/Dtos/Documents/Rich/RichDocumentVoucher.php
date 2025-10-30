<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document voucher class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentVoucher::getAvailableBalance()
 * @see RichDocumentVoucher::getCode()
 * 
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentVoucher extends Element{
    use ElementTrait;

    protected string $availableBalance = '';

    protected string $code = '';

    /**
     * Returns the rich document voucher availableBalance.
     *
     * @return string
     */
    public function getAvailableBalance(): string {
        return $this->availableBalance;
    }

    /**
     * Returns the rich document voucher code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

}
