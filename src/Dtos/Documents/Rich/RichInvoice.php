<?php

namespace SDK\Dtos\Documents\Rich;

/**
 * The rich invoice document.
 * The rich invoice document is a document that represents an invoice.
 * 
 * @see getAdditionalItems
 * @see getAdditionalInformation
 * @see getStatus
 * @see getSubstatus
 * @see getPaymentSystem
 * @see getPaymentDate
 * @see getDeliveryDate
 * @see getPaid
 * 
 * @see RichDocument
 * 
 * @package SDK\Dtos\Documents\Rich
 */
class RichInvoice extends RichDocument {
    
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
     * Returns the rich document substatus.
     *
     * @deprecated
     * @return string
     */
    public function getSubstatus(): string {
        return $this->substatus;
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