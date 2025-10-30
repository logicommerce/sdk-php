<?php

namespace SDK\Dtos\Documents\Transactions\Purchases;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\DocumentCustomTag;
use SDK\Dtos\Documents\Transactions\DocumentDiscount;
use SDK\Dtos\Documents\Transactions\TransactionDocument;

/**
 * This is the purchase document class.
 * The purchase document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PurchaseDocument::getCustomTags()
 * @see PurchaseDocument::getPaymentSystem()
 * @see PurchaseDocument::getVouchers()
 * @see PurchaseDocument::getDiscounts()
 * @see PurchaseDocument::getMarketplaceId()
 * @see PurchaseDocument::getTransactionId()
 * @see PurchaseDocument::getAuthNumber()
 * @see PurchaseDocument::getOnRequestAffected()
 * @see PurchaseDocument::getReserve()
 *
 * @see TransactionDocument
 *
 * @package SDK\Dtos\Documents\Transactions\Purchases
 */
abstract class PurchaseDocument extends TransactionDocument {
    use ElementTrait;

    protected array $customTags = [];

    protected ?DocumentPaymentSystem $paymentSystem = null;

    protected array $vouchers = [];

    protected array $discounts = [];

    protected int $marketplaceId = 0;

    protected string $transactionId = '';

    protected string $authNumber = '';

    protected bool $onRequestAffected = false;

    protected bool $reserve = false;

    /**
     * Returns information about records of custom tags.
     *
     * @return DocumentCustomTag[]
     */
    public function getCustomTags(): array {
        return $this->customTags;
    }

    protected function setCustomTags(array $customTags): void {
        $this->customTags = $this->setArrayField($customTags, DocumentCustomTag::class);
    }

    /**
     * Returns payment system.
     *
     * @return DocumentPaymentSystem|NULL
     */
    public function getPaymentSystem(): ?DocumentPaymentSystem {
        return $this->paymentSystem;
    }

    protected function setPaymentSystem(array $paymentSystem): void {
        $this->paymentSystem = new DocumentPaymentSystem($paymentSystem);
    }

    /**
     * Returns information about gift coupon records that are applied using a code.
     *
     * @return DocumentVoucher[]
     */
    public function getVouchers(): array {
        return $this->vouchers;
    }

    protected function setVouchers(array $vouchers): void {
        $this->vouchers = $this->setArrayField($vouchers, DocumentVoucher::class);
    }

    /**
     * Returns information about records of discounts applied.
     *
     * @return DocumentDiscount[]
     */
    public function getDiscounts(): array {
        return $this->discounts;
    }

    protected function setDiscounts(array $discounts): void {
        $this->discounts = $this->setArrayField($discounts, DocumentDiscount::class);
    }

    /**
     * Returns internal identifier of the marketplace."
     *
     * @return int
     */
    public function getMarketplaceId(): int {
        return $this->marketplaceId;
    }

    /**
     * Returns order transaction identifier.
     *
     * @return string
     */
    public function getTransactionId(): string {
        return $this->transactionId;
    }

    /**
     * Returns order authorization code.
     *
     * @return string
     */
    public function getAuthNumber(): string {
        return $this->authNumber;
    }

    /**
     * Returns an indication that it is an order with some product units served on-request.
     *
     * @return bool
     */
    public function getOnRequestAffected(): bool {
        return $this->onRequestAffected;
    }

    /**
     * Returns a specification that it is an 'Order with products in reserve'.
     *
     * @return bool
     */
    public function getReserve(): bool {
        return $this->reserve;
    }
}
