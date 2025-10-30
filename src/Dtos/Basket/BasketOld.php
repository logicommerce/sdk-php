<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Factories\BasketRowFactory;
use SDK\Core\Dtos\Factories\BasketTaxFactory;
use SDK\Core\Dtos\Factories\AppliedDiscountTotalFactory;
use SDK\Core\Dtos\Factories\BasketDeliveryFactory;
use SDK\Dtos\Basket\BasketWarnings\BasketWarning;
use SDK\Enums\BasketRowType;

/**
 * This is the basket class.
 * The basket information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Basket::getToken()
 * @see Basket::getItems()
 * @see Basket::getItem()
 * @see Basket::getBasketUser()
 * @see Basket::getCreatedAt()
 * @see Basket::getUpdatedAt()
 * @see Basket::getDelivery()
 * @see Basket::getPaymentSystem()
 * @see Basket::getVouchers()
 * @see Basket::getTaxes()
 * @see Basket::getTotals()
 * @see Basket::getAppliedDiscounts()
 * @see Basket::getComment()
 * @see Basket::getBasketWarnings()
 * @see Basket::getAllBasketWarnings()
 * @see Basket::getItemsBasketWarnings()
 * @see Basket::getItemBasketWarnings()
 * @see Basket::getDeliveryBasketWarnings()
 * @see Basket::getDeliveryItemBasketWarnings()
 * @see Basket::getCustomTagValues()
 * @see Basket::getRewardPoints()
 * @see Basket::getLockedStockTimers()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class BasketOld extends Element {
    use ElementTrait;

    protected string $token = '';

    protected ?Date $createdAt = null;

    protected ?Date $updatedAt = null;

    protected array $items = [];

    protected ?BasketDelivery $delivery = null;

    protected ?PaymentSystem $paymentSystem = null;

    protected ?BasketUser $basketUser = null;

    protected ?ExpressCheckout $expressCheckout = null;

    protected ?VoucherGroup $vouchers = null;

    protected array $taxes = [];

    protected ?BasketTotal $totals = null;

    protected array $appliedDiscounts = [];

    protected string $comment = '';

    protected array $basketWarnings = [];

    protected array $customTagValues = [];

    protected array $rewardPoints = [];

    protected array $lockedStockTimers = [];

    /**
     * Returns the basket token.
     *
     * @return string
     */
    public function getToken(): string {
        return $this->token;
    }

    /**
     * Returns the basket items.
     *
     * @return BasketRow[]
     */
    public function getItems(): array {
        return $this->items;
    }

    /**
     * Returns the item with the given hash.
     *
     * @param string $hash
     *
     * @return BasketRow|NULL
     */
    public function getItem(string $hash): ?BasketRow {
        $basketRows = $this->getItems();
        foreach ($basketRows as $basketRow) {
            if ($basketRow->getType() === BasketRowType::BUNDLE) {
                if ($hash === $basketRow->getHash()) {
                    return $basketRow;
                } else {
                    foreach ($basketRow->getItems() as $item) {
                        if ($hash === $item->getHash()) {
                            return $item;
                        }
                    }
                }
            } else {
                if ($hash === $basketRow->getHash()) {
                    return $basketRow;
                }
            }
        }
        return null;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, BasketRowFactory::class);
    }

    /**
     * Returns the basket user.
     *
     * @return BasketUser
     */
    public function getBasketUser(): ?BasketUser {
        return $this->basketUser;
    }

    protected function setBasketUser(array $basketUser): void {
        $this->basketUser = new BasketUser($basketUser);
    }

    /**
     * Returns the express checkout information if exists.
     * 
     * @return ExpressCheckout|NULL
     */
    public function getExpressCheckout(): ?ExpressCheckout {
        return $this->expressCheckout;
    }

    protected function setExpressCheckout(array $expressCheckout): void {
        $this->expressCheckout = new ExpressCheckout($expressCheckout);
    }

    /**
     * Returns the basket creation date.
     *
     * @return Date|NULL
     */
    public function getCreatedAt(): ?Date {
        return $this->createdAt;
    }

    protected function setCreatedAt(string $createdAt): void {
        $this->createdAt = Date::create($createdAt);
    }

    /**
     * Returns the basket last update date.
     *
     * @return Date|NULL
     */
    public function getUpdatedAt(): ?Date {
        return $this->updatedAt;
    }

    protected function setUpdatedAt(string $updatedAt): void {
        $this->updatedAt = Date::create($updatedAt);
    }

    /**
     * Returns the basket delivery.
     *
     * @return BasketDelivery|NULL
     */
    public function getDelivery(): ?BasketDelivery {
        return $this->delivery;
    }

    protected function setDelivery(array $delivery): void {
        $this->delivery = BasketDeliveryFactory::getElement($delivery);
    }

    /**
     * Returns the basket setted payment system.
     *
     * @return PaymentSystem|NULL
     */
    public function getPaymentSystem(): ?PaymentSystem {
        return $this->paymentSystem;
    }

    protected function setPaymentSystem(array $paymentSystem): void {
        $this->paymentSystem = new PaymentSystem($paymentSystem);
    }

    /**
     * Returns the basket voucher group.
     *
     * @return VoucherGroup|NULL
     */
    public function getVouchers(): ?VoucherGroup {
        return $this->vouchers;
    }

    protected function setVouchers(array $vouchers): void {
        $this->vouchers = new VoucherGroup($vouchers);
    }

    /**
     * Returns the basket taxes.
     *
     * @return BasketTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, BasketTaxFactory::class);
    }

    /**
     * Returns the basket total.
     *
     * @return BasketTotal|NULL
     */
    public function getTotals(): ?BasketTotal {
        return $this->totals;
    }

    protected function setTotals(array $totals): void {
        $this->totals = new BasketTotal($totals);
    }

    /**
     * Returns the basket applied discounts.
     *
     * @return AppliedDiscount[]
     */
    public function getAppliedDiscounts(): array {
        return $this->appliedDiscounts;
    }

    protected function setAppliedDiscounts(array $appliedDiscounts): void {
        $this->appliedDiscounts = $this->setArrayField($appliedDiscounts, AppliedDiscountTotalFactory::class);
    }

    /**
     * Returns the basket comments.
     *
     * @return string
     */
    public function getComment(): string {
        return $this->comment;
    }

    /**
     * Returns the basket warnings.
     *
     * @return BasketWarning[]
     */
    public function getBasketWarnings(): array {
        return $this->basketWarnings;
    }

    protected function setBasketWarnings(array $basketWarnings): void {
        $this->basketWarnings = $this->setArrayField($basketWarnings, BasketWarning::class);
    }

    /**
     * Returns all the warnings inside the basket structure (main basket warnings, rows warnings and deliveries warnings).
     *
     * @return BasketWarning[]
     */
    public function getAllBasketWarnings(): array {
        return [...$this->basketWarnings, ...$this->getItemsBasketWarnings(), ...$this->getDeliveryBasketWarnings()];
    }

    /**
     * Returns all the warnings inside the basket items array.
     *
     * @return BasketWarning[]
     */
    public function getItemsBasketWarnings(): array {
        $warnings = [];
        $basketRows = $this->getItems();
        foreach ($basketRows as $basketRow) {
            if ($basketRow->getType() === BasketRowType::PRODUCT) {
                $warnings = [...$warnings, ...$basketRow->getBasketWarnings()];
            } else if ($basketRow->getType() === BasketRowType::BUNDLE) {
                foreach ($basketRow->getItems() as $item) {
                    $warnings = [...$warnings, ...$item->getBasketWarnings()];
                }
            }
        }
        return $warnings;
    }

    /**
     * Returns all the warnings that belongs to the item with the given hash.
     *
     * @param string $hash
     *
     * @return BasketWarning[]
     */
    public function getItemBasketWarnings(string $hash): array {
        $warnings = [];
        $row = $this->getItem($hash);
        if (!is_null($row)) {
            if ($row->getType() === BasketRowType::PRODUCT) {
                $warnings = [...$warnings, ...$row->getBasketWarnings()];
            } else if ($row->getType() === BasketRowType::BUNDLE) {
                foreach ($row->getItems() as $item) {
                    if (!is_null($warnings) && sizeof($warnings) > 0) {
                        $warnings = [...$warnings, ...$item->getBasketWarnings()];
                    }
                }
            }
        }
        return [...$warnings, ...$this->getDeliveryItemBasketWarnings($hash)];
    }

    /**
     * Returns all the warnings inside the delivery warnings array.
     *
     * @return BasketWarning[]
     */
    public function getDeliveryBasketWarnings(): array {
        $delivery = $this->getDelivery();
        if (is_null($delivery)) {
            return [];
        }
        return $delivery->getAllBasketWarnings();
    }

    /**
     * Returns all the warnings inside the delivery warnings array for the item with the given hash.
     *
     * @param string $hash
     *
     * @return BasketWarning[]
     */
    public function getDeliveryItemBasketWarnings(string $hash): array {
        $itemWarnings = [];
        $warnings = $this->getDeliveryBasketWarnings();
        foreach ($warnings as $warning) {
            if (in_array($hash, $warning->getHashes())) {
                $itemWarnings[] = $warning;
            }
        }
        return $itemWarnings;
    }

    /**
     * Returns the basket custom tag values.
     *
     * @return BasketCustomTagValue[]
     */
    public function getCustomTagValues(): array {
        return $this->customTagValues;
    }

    protected function setCustomTagValues(array $customTagValues): void {
        $this->customTagValues = $this->setArrayField($customTagValues, BasketCustomTagValue::class);
    }

    /**
     * Returns the basket reward points values.
     *
     * @return BasketRewardPoints[]
     */
    public function getRewardPoints(): array {
        return $this->rewardPoints;
    }

    protected function setRewardPoints(array $rewardPoints): void {
        $this->rewardPoints = $this->setArrayField($rewardPoints, BasketRewardPoints::class);
    }

    /**
     * Returns the Basket Locked Stock Timers values.
     *
     * @return BasketLockedStockTimers[]
     */
    public function getLockedStockTimers(): array {
        return $this->lockedStockTimers;
    }

    protected function setLockedStockTimers(array $lockedStockTimers): void {
        $this->lockedStockTimers = $this->setArrayField($lockedStockTimers, BasketLockedStockTimers::class);
    }
}
