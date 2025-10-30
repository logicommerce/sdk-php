<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the basket voucher group class.
 * The basket voucher groups information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see VoucherGroup::getDiscountCodes()
 * @see VoucherGroup::getVouchers()
 * @see VoucherGroup::getDirectVouchers()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class VoucherGroup {
    use ElementTrait;

    protected array $discountCodes = [];

    protected array $vouchers = [];

    protected array $directVouchers = [];

    /**
     * Returns an array with the basket discount codes.
     *
     * @return DiscountCode[]
     */
    public function getDiscountCodes(): array {
        return $this->discountCodes;
    }

    protected function setDiscountCodes(array $discountCodes): void {
        $this->discountCodes = $this->setArrayField($discountCodes, DiscountCode::class);
    }

    /**
     * Returns an array with the basket vouchers.
     *
     * @return Voucher[]
     */
    public function getVouchers(): array {
        return $this->vouchers;
    }

    protected function setVouchers(array $vouchers): void {
        $this->vouchers = $this->setArrayField($vouchers, Voucher::class);
    }

    /**
     * Returns an array with the basket direct vouchers.
     *
     * @return Voucher[]
     */
    public function getDirectVouchers(): array {
        return $this->directVouchers;
    }

    protected function setDirectVouchers(array $directVouchers): void {
        $this->directVouchers = $this->setArrayField($directVouchers, Voucher::class);
    }
}
