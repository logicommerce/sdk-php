<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Factories\RichDocumentDeliveryFactory;
use SDK\Core\Dtos\Factories\RichDocumentTaxFactory;

/**
 * The rich delivery note document.
 * The rich delivery note document is a document that represents a delivery note.
 * 
 * @see getVouchers
 * @see getCurrencies
 * @see getAdditionalItems
 * @see getAdditionalInformation
 * @see getStatus
 * @see getComment
 * @see getPaymentSystem
 * @see getSubstatus
 * @see getDiscounts
 * @see getTaxes
 * @see getCustomTags
 * @see getDelivery
 * @see getOnRequestAffected
 * @see getPaymentDate
 * @see getDeliveryDate
 * @see getPaid
 * 
 * @see RichDocument
 * 
 * @package SDK\Dtos\Documents\Rich
 */
class RichDeliveryNote extends RichDocument {

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
     * Returns the rich document currencies.
     *
     * @deprecated
     * @return RichDocumentCurrency[]
     */
    public function getCurrencies(): array {
        return $this->currencies;
    }

    /**
     * @deprecated
     */
    protected function setCurrencies(array $currencies): void {
        $this->currencies = $this->setArrayField($currencies, RichDocumentCurrency::class);
    }

    /**
     * Returns the rich document additionalItems.
     *
     * @deprecated
     * @return RichDocumentAdditionalItem[]
     */
    public function getAdditionalItems(): array {
        return $this->additionalItems;
    }

    /**
     * @deprecated
     */
    protected function setAdditionalItems(array $additionalItems): void {
        $this->additionalItems = $this->setArrayField($additionalItems, RichDocumentAdditionalItem::class);
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
     * Returns the rich document comment.
     *
     * @deprecated
     * @return string
     */
    public function getComment(): string {
        return $this->comment;
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
     * Returns the rich document taxes.
     *
     * @deprecated
     * @return RichDocumentTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    /**
     * @deprecated
     */
    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, RichDocumentTaxFactory::class);
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
     * Returns the rich document delivery.
     *
     * @deprecated
     * @return RichDocumentDelivery|NULL
     */
    public function getDelivery(): ?RichDocumentDelivery {
        return $this->delivery;
    }

    /**
     * @deprecated
     */
    protected function setDelivery(array $delivery): void {
        $this->delivery = RichDocumentDeliveryFactory::getElement($delivery);
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