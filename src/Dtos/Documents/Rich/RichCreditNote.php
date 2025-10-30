<?php

namespace SDK\Dtos\Documents\Rich;

/**
 * The rich credit note document.
 * The rich credit note document is a document that represents a credit note.
 * 
 * @see getVouchers
 * @see getAdditionalInformation
 * @see getStatus
 * @see getPaymentSystem
 * @see getSubstatus
 * @see getDiscounts
 * @see getCustomTags
 * @see getOnRequestAffected
 * @see getPaymentDate
 * @see getDeliveryDate
 * @see getPaid
 * 
 * @see RichReturnProcessDocument
 * 
 * @package SDK\Dtos\Documents\Rich
 */
class RichCreditNote extends RichReturnProcessDocument {

    /**
     * Returns the rich document vouchers.
     *
     * @deprecated
     * @return RichDocumentVoucher[]
     */
    public function getVouchers(): array {
        return $this->vouchers;
    }

    /**
     * @deprecated
     */
    protected function setVouchers(array $vouchers): void {
        $this->vouchers = $this->setArrayField($vouchers, RichDocumentVoucher::class);
    }

    /**
     * Returns the rich document additionalInformation.
     *
     * @deprecated
     * @return RichDocumentAdditionalInformation[]
     */
    public function getAdditionalInformation(): array {
        return $this->additionalInformation;
    }

    /**
     * @deprecated
     */
    protected function setAdditionalInformation(array $additionalInformation): void {
        $this->additionalInformation = $this->setArrayField($additionalInformation, RichDocumentAdditionalInformation::class);
    }

    /**
     * Returns the rich document status.
     *
     * @deprecated
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * Returns the rich document paymentSystem.
     *
     * @deprecated
     * @return RichDocumentPaymentSystem|NULL
     */
    public function getPaymentSystem(): ?RichDocumentPaymentSystem {
        return $this->paymentSystem;
    }

    /**
     * @deprecated
     */
    protected function setPaymentSystem(array $paymentSystem): void {
        $this->paymentSystem = new RichDocumentPaymentSystem($paymentSystem);
    }

    /**
     * Returns the rich document substatus.
     *
     * @deprecated
     * @return string
     */
    public function getSubstatus(): string {
        return $this->substatus;
    }

    /**
     * Returns the rich document discounts.
     *
     * @deprecated
     * @return RichDocumentDiscount[]
     */
    public function getDiscounts(): array {
        return $this->discounts;
    }

    /**
     * @deprecated
     */
    protected function setDiscounts(array $discounts): void {
        $this->discounts = $this->setArrayField($discounts, RichDocumentDiscount::class);
    }

    /**
     * Returns the rich document customTags.
     *
     * @deprecated
     * @return RichDocumentCustomTag[]
     */
    public function getCustomTags(): array {
        return $this->customTags;
    }

    /**
     * @deprecated
     */
    protected function setCustomTags(array $customTags): void {
        $this->customTags = $this->setArrayField($customTags, RichDocumentCustomTag::class);
    }

    /**
     * Returns the rich document onRequestAffected.
     *
     * @deprecated
     * @return bool
     */
    public function getOnRequestAffected(): bool {
        return $this->onRequestAffected;
    }

    /**
     * Returns the rich document paymentDate.
     *
     * @deprecated
     * @return RichDateTime|NULL
     */
    public function getPaymentDate(): ?RichDateTime {
        return $this->paymentDate;
    }

    /**
     * @deprecated
     */
    protected function setPaymentDate(array $paymentDate): void {
        $this->paymentDate = new RichDateTime($paymentDate);
    }

    /**
     * Returns the rich document deliveryDate.
     *
     * @deprecated
     * @return RichDateTime|NULL
     */
    public function getDeliveryDate(): ?RichDateTime {
        return $this->deliveryDate;
    }

    /**
     * @deprecated
     */
    protected function setDeliveryDate(array $deliveryDate): void {
        $this->deliveryDate = new RichDateTime($deliveryDate);
    }

    /**
     * Returns the rich document paid.
     *
     * @deprecated
     * @return bool
     */
    public function getPaid(): bool {
        return $this->paid;
    }
}