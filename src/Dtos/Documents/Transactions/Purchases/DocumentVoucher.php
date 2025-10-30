<?php

namespace SDK\Dtos\Documents\Transactions\Purchases;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the document voucher class.
 * The document vouchers will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentVoucher::getVoucherId()
 * @see DocumentVoucher::getAvailableBalance()
 * @see DocumentVoucher::getCode()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Purchases
 */
class DocumentVoucher extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected int $voucherId = 0;

    protected float $availableBalance = 0.0;

    protected string $code = '';

    /**
     * Returns coupon identifier.
     *
     * @return int
     */
    public function getVoucherId(): int {
        return $this->voucherId;
    }

    /**
     * Returns total amount applied for the gift coupon.
     *
     * @return float
     */
    public function getAvailableBalance(): float {
        return $this->availableBalance;
    }

    /**
     * Returns Information about gift coupon records that are applied using a code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }
}
