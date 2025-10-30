<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\RichDocumentDeliveryFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Factories\RichDocumentItemFactory;
use SDK\Core\Dtos\Factories\RichDocumentTaxFactory;

/**
 * This is the rich document class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocument::getGetpId()
 * @see RichDocument::getDocumentNumber()
 * @see RichDocument::getDate()
 * @see RichDocument::getDeliveryDate()
 * @see RichDocument::getPaid()
 * @see RichDocument::getPaymentDate()
 * @see RichDocument::getComment()
 * @see RichDocument::getReverseChargeVat()
 * @see RichDocument::getStatus()
 * @see RichDocument::getSubstatus()
 * @see RichDocument::getReverse()
 * @see RichDocument::getLanguageCode()
 * @see RichDocument::getCustomTags()
 * @see RichDocument::getItems()
 * @see RichDocument::getDelivery()
 * @see RichDocument::getAdditionalInformation()
 * @see RichDocument::getCurrencies()
 * @see RichDocument::getHeadquarter()
 * @see RichDocument::getInformation()
 * @see RichDocument::getPaymentSystem()
 * @see RichDocument::getTaxes()
 * @see RichDocument::getTotals()
 * @see RichDocument::getUser()
 * @see RichDocument::getVouchers()
 * @see RichDocument::getDiscounts()
 * @see RichDocument::getAdditionalItems()
 * @see RichDocument::getDocumentParents()
 * @see RichDocument::getOnRequestAffected()
 * @see RichDocument::getRewardPoints()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
abstract class RichDocument extends Element {
    use ElementTrait;

    protected string $getpId = '';

    protected string $documentNumber = '';

    protected ?RichDateTime $date = null;

    protected ?RichDateTime $deliveryDate = null;

    protected bool $paid = false;

    protected ?RichDateTime $paymentDate = null;

    protected string $comment = '';

    /**
     * @deprecated
     */
    protected bool $reverseChargeVat = false;

    protected string $status = '';

    protected string $substatus = '';

    protected bool $reverse = false;

    protected string $languageCode = '';

    protected array $customTags = [];

    protected array $items = [];

    protected ?RichDocumentDelivery $delivery = null;

    protected array $additionalInformation = [];

    protected array $currencies = [];

    protected ?RichDocumentHeadquarter $headquarter = null;

    /**
     * @deprecated
     */
    protected ?RichDocumentInformation $information = null;

    protected ?RichDocumentPaymentSystem $paymentSystem = null;

    protected array $taxes = [];

    protected ?RichDocumentTotal $totals = null;

    protected ?RichDocumentUser $user = null;

    protected array $vouchers = [];

    protected array $discounts = [];

    protected array $additionalItems = [];

    protected array $documentParents = [];

    protected bool $onRequestAffected = false;

    protected array $rewardPoints = [];

    /**
     * Returns the rich document getpId.
     *
     * @return string
     */
    public function getGetpId(): string {
        return $this->getpId;
    }

    /**
     * Returns the rich document documentNumber.
     *
     * @return string
     */
    public function getDocumentNumber(): string {
        return $this->documentNumber;
    }

    /**
     * Returns the rich document date.
     *
     * @return RichDateTime|NULL
     */
    public function getDate(): ?RichDateTime {
        return $this->date;
    }

    protected function setDate(array $date): void {
        $this->date = new RichDateTime($date);
    }

    /**
     * Returns the rich document deliveryDate.
     *
     * @return RichDateTime|NULL
     */
    public function getDeliveryDate(): ?RichDateTime {
        return $this->deliveryDate;
    }

    protected function setDeliveryDate(array $deliveryDate): void {
        $this->deliveryDate = new RichDateTime($deliveryDate);
    }

    /**
     * Returns the rich document paid.
     *
     * @return bool
     */
    public function getPaid(): bool {
        return $this->paid;
    }

    /**
     * Returns the rich document paymentDate.
     *
     * @return RichDateTime|NULL
     */
    public function getPaymentDate(): ?RichDateTime {
        return $this->paymentDate;
    }

    protected function setPaymentDate(array $paymentDate): void {
        $this->paymentDate = new RichDateTime($paymentDate);
    }

    /**
     * Returns the rich document comment.
     *
     * @return string
     */
    public function getComment(): string {
        return $this->comment;
    }

    /**
     * Returns the rich document reverseChargeVat.
     *
     * @deprecated
     * @return bool
     */
    public function getReverseChargeVat(): bool {
        return $this->reverseChargeVat;
    }

    /**
     * Returns the rich document status.
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * Returns the rich document substatus.
     *
     * @return string
     */
    public function getSubstatus(): string {
        return $this->substatus;
    }

    /**
     * Returns the rich document reverse.
     *
     * @return bool
     */
    public function getReverse(): bool {
        return $this->reverse;
    }

    /**
     * Returns the rich document languageCode.
     *
     * @return string
     */
    public function getLanguageCode(): string {
        return $this->languageCode;
    }

    /**
     * Returns the rich document customTags.
     *
     * @return RichDocumentCustomTag[]
     */
    public function getCustomTags(): array {
        return $this->customTags;
    }

    protected function setCustomTags(array $customTags): void {
        $this->customTags = $this->setArrayField($customTags, RichDocumentCustomTag::class);
    }

    /**
     * Returns the rich document items.
     *
     * @return RichDocumentItem[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, RichDocumentItemFactory::class);
    }

    /**
     * Returns the rich document delivery.
     *
     * @return RichDocumentDelivery|NULL
     */
    public function getDelivery(): ?RichDocumentDelivery {
        return $this->delivery;
    }

    protected function setDelivery(array $delivery): void {
        $this->delivery = RichDocumentDeliveryFactory::getElement($delivery);
    }

    /**
     * Returns the rich document additionalInformation.
     *
     * @return RichDocumentAdditionalInformation[]
     */
    public function getAdditionalInformation(): array {
        return $this->additionalInformation;
    }

    protected function setAdditionalInformation(array $additionalInformation): void {
        $this->additionalInformation = $this->setArrayField($additionalInformation, RichDocumentAdditionalInformation::class);
    }

    /**
     * Returns the rich document currencies.
     *
     * @return RichDocumentCurrency[]
     */
    public function getCurrencies(): array {
        return $this->currencies;
    }

    protected function setCurrencies(array $currencies): void {
        $this->currencies = $this->setArrayField($currencies, RichDocumentCurrency::class);
    }

    /**
     * Returns the rich document headquarter.
     *
     * @return RichDocumentHeadquarter|NULL
     */
    public function getHeadquarter(): ?RichDocumentHeadquarter {
        return $this->headquarter;
    }

    protected function setHeadquarter(array $headquarter): void {
        $this->headquarter = new RichDocumentHeadquarter($headquarter);
    }

    /**
     * Returns the rich document information.
     *
     * @deprecated
     * @return RichDocumentInformation|NULL
     */
    public function getInformation(): ?RichDocumentInformation {
        return $this->information;
    }

    /**
     * @deprecated
     */
    protected function setInformation(array $information): void {
        $this->information = new RichDocumentInformation($information);
    }

    /**
     * Returns the rich document paymentSystem.
     *
     * @return RichDocumentPaymentSystem|NULL
     */
    public function getPaymentSystem(): ?RichDocumentPaymentSystem {
        return $this->paymentSystem;
    }

    protected function setPaymentSystem(array $paymentSystem): void {
        $this->paymentSystem = new RichDocumentPaymentSystem($paymentSystem);
    }

    /**
     * Returns the rich document taxes.
     *
     * @return RichDocumentTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, RichDocumentTaxFactory::class);
    }

    /**
     * Returns the rich document totals.
     *
     * @return RichDocumentTotal|NULL
     */
    public function getTotals(): ?RichDocumentTotal {
        return $this->totals;
    }

    protected function setTotals(array $totals): void {
        $this->totals = new RichDocumentTotal($totals);
    }

    /**
     * Returns the rich document user.
     *
     * @return RichDocumentUser|NULL
     */
    public function getUser(): ?RichDocumentUser {
        return $this->user;
    }

    protected function setUser(array $user): void {
        $this->user = new RichDocumentUser($user);
    }

    /**
     * Returns the rich document vouchers.
     *
     * @return RichDocumentVoucher[]
     */
    public function getVouchers(): array {
        return $this->vouchers;
    }

    protected function setVouchers(array $vouchers): void {
        $this->vouchers = $this->setArrayField($vouchers, RichDocumentVoucher::class);
    }

    /**
     * Returns the rich document discounts.
     *
     * @return RichDocumentDiscount[]
     */
    public function getDiscounts(): array {
        return $this->discounts;
    }

    protected function setDiscounts(array $discounts): void {
        $this->discounts = $this->setArrayField($discounts, RichDocumentDiscount::class);
    }

    /**
     * Returns the rich document additionalItems.
     *
     * @return RichDocumentAdditionalItem[]
     */
    public function getAdditionalItems(): array {
        return $this->additionalItems;
    }

    protected function setAdditionalItems(array $additionalItems): void {
        $this->additionalItems = $this->setArrayField($additionalItems, RichDocumentAdditionalItem::class);
    }

    /**
     * Returns the rich document documentParents.
     *
     * @return RichDocumentParent[]
     */
    public function getDocumentParents(): array {
        return $this->documentParents;
    }

    protected function setDocumentParents(array $documentParents): void {
        $this->documentParents = $this->setArrayField($documentParents, RichDocumentParent::class);
    }

    /**
     * Returns the rich document onRequestAffected.
     *
     * @return bool
     */
    public function getOnRequestAffected(): bool {
        return $this->onRequestAffected;
    }


    /**
     * Returns the rich document rewardPoints.
     *
     * @return RichDocumentRewardPoints[]
     */
    public function getRewardPoints(): array {
        return $this->rewardPoints;
    }

    protected function setRewardPoints(array $rewardPoints): void {
        $this->rewardPoints = $this->setArrayField($rewardPoints, RichDocumentRewardPoints::class);
    }
}
