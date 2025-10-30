<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\AccountFactory;
use SDK\Core\Dtos\Factories\AccountLinkedFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Factories\BasketRowFactory;
use SDK\Core\Dtos\Factories\BasketTaxFactory;
use SDK\Core\Dtos\Factories\AppliedDiscountTotalFactory;
use SDK\Core\Dtos\Factories\BasketDeliveryFactory;
use SDK\Core\Dtos\Factories\MasterRefFactory;
use SDK\Core\Dtos\Factories\SessionUsageModeFactory;
use SDK\Dtos\Accounts\Account;
use SDK\Dtos\Accounts\AccountLinked;
use SDK\Dtos\Accounts\MasterRef;
use SDK\Dtos\Accounts\RegisteredUserSimpleProfile;
use SDK\Dtos\Basket\BasketRows\Bundle;
use SDK\Dtos\Basket\BasketRows\Bundle\BundleItem;
use SDK\Dtos\Basket\BasketRows\Product;
use SDK\Dtos\Basket\BasketWarnings\BasketWarning;
use SDK\Enums\BasketRowType;
use SDK\Enums\SessionType;

/**
 * This class represents a basket.
 * The basket information is stored in this class and remains immutable.
 * (only getter methods are available).
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class Basket extends Element {
    use ElementTrait;

    protected string $token = '';
    protected ?Date $createdAt = null;
    protected ?Date $updatedAt = null;

    protected String $referer = ''; // NEW FIELD
    protected String $userAgent = ''; // NEW FIELD
    protected String $navigationHash = ''; // NEW FIELD
    protected String $navigationCurrencyCode = ''; // NEW FIELD
    protected String $navigationLanguageCode = ''; // NEW FIELD
    protected ?Channel $channel = null; // NEW FIELD

    protected array $items = [];
    protected ?BasketDelivery $delivery = null;
    protected ?PaymentSystem $paymentSystem = null;
    protected ?BasketUser $basketUser = null; // DEPRECATED

    protected ?AccountLinked $customer = null; // NEW FIELD
    protected array $rewardPoints = [];
    protected array $taxes = [];
    protected ?BasketTotal $totals = null;
    protected array $appliedDiscounts = [];
    protected array $basketWarnings = [];
    protected string $comment = '';
    protected array $customTagValues = [];
    protected array $lockedStockTimers = [];
    protected ?ExpressCheckout $expressCheckout = null;
    protected ?VoucherGroup $vouchers = null;
    protected SessionType $type = SessionType::ANONYMOUS; // NEW FIELD
    protected ?SessionUsageMode $mode = null; // NEW FIELD
    protected ?Account $account = null; // NEW FIELD
    protected ?RegisteredUserSimpleProfile $registeredUser = null; // NEW FIELD
    protected ?MasterRef $accountRegisteredUser = null; // NEW FIELD

    /**
     * Returns the basket token.
     *
     * @return string
     */
    public function getToken(): string {
        return $this->token;
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
     * Returns the basket referer.
     *
     * @return string | NULL
     */
    public function getReferer(): ?string {
        return $this->referer;
    }

    /**
     * Returns the basket user agent.
     *
     * @return string
     */
    public function getUserAgent(): string {
        return $this->userAgent;
    }

    /**
     * Returns the basket navigation hash.
     *
     * @return string
     */
    public function getNavigationHash(): string {
        return $this->navigationHash;
    }

    /**
     * Returns the basket navigation currency code.
     *
     * @return string
     */
    public function getNavigationCurrencyCode(): string {
        return $this->navigationCurrencyCode;
    }

    /**
     * Returns the basket navigation language code.
     *
     * @return string
     */
    public function getNavigationLanguageCode(): string {
        return $this->navigationLanguageCode;
    }

    /**
     * Returns the basket channel.
     *
     * @return Channel|NULL
     */
    public function getChannel(): ?Channel {
        return $this->channel;
    }

    protected function setChannel(array $channel): void {
        $this->channel = new Channel($channel);
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
                /** @var Bundle $rowBundle */
                $rowBundle = $basketRow;
                if ($hash === $rowBundle->getHash()) {
                    return $rowBundle;
                } else {
                    foreach ($rowBundle->getItems() as $item) {
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
     * Returns the basket user.
     * 
     * @Deprecated use getCustomer() instead
     *
     * @return BasketUser
     */
    public function getBasketUser(): ?BasketUser {
        if (is_null($this->basketUser)) {
            $this->basketUser = BasketUserCreator::create($this);
        }
        return $this->basketUser;
    }

    protected function setBasketUser(array $basketUser): void {
        // DO Nothing
    }

    /**
     * Returns the basket customer.
     *
     * @return AccountLinked|NULL
     */
    public function getCustomer(): ?AccountLinked {
        return $this->customer;
    }

    protected function setCustomer(array $customer): void {
        $this->customer = AccountLinkedFactory::create($customer);
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
        $this->appliedDiscounts = $this->setArrayField(
            $appliedDiscounts,
            AppliedDiscountTotalFactory::class
        );
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
     * Returns all the warnings inside the basket structure (main basket warnings, rows warnings and
     * deliveries warnings).
     *
     * @return BasketWarning[]
     */
    public function getAllBasketWarnings(): array {
        return [
            ...$this->basketWarnings,
            ...$this->getItemsBasketWarnings(),
            ...$this->getDeliveryBasketWarnings()
        ];
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
                /** @var Product $rowProduct */
                $rowProduct = $basketRow;
                $warnings = [...$warnings, ...$rowProduct->getBasketWarnings()];
            } else if ($basketRow->getType() === BasketRowType::BUNDLE) {
                /** @var Bundle $rowBundle */
                $rowBundle = $basketRow;
                /** @var BundleItem $item */
                foreach ($rowBundle->getItems() as $item) {
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
                /** @var Product $rowProduct */
                $rowProduct = $row;
                $warnings = [...$warnings, ...$rowProduct->getBasketWarnings()];
            } else if ($row->getType() === BasketRowType::BUNDLE) {
                /** @var Bundle $rowBundle */
                $rowBundle = $row;
                /** @var BundleItem $item */
                foreach ($rowBundle->getItems() as $item) {
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
     * Returns the basket comments.
     *
     * @return string
     */
    public function getComment(): string {
        return $this->comment;
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
        $this->customTagValues = $this->setArrayField(
            $customTagValues,
            BasketCustomTagValue::class
        );
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
        $this->lockedStockTimers = $this->setArrayField(
            $lockedStockTimers,
            BasketLockedStockTimers::class
        );
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
     * Returns the session type.
     *
     * @return SessionType
     */
    public function getType(): SessionType {
        return $this->type;
    }

    protected function setType(string $type): void {
        $this->type = SessionType::from($type);
    }

    /**
     * Returns the session usage mode.
     *
     * @return SessionUsageMode|NULL
     */
    public function getMode(): ?SessionUsageMode {
        return $this->mode;
    }

    protected function setMode(array $mode): void {
        $this->mode = SessionUsageModeFactory::create($mode);
    }

    /**
     * Returns the account.
     *
     * @return Account|NULL
     */
    public function getAccount(): ?Account {
        return $this->account;
    }

    protected function setAccount(array $account): void {
        $this->account = AccountFactory::getElement($account);
    }

    /**
     * Returns the registered user.
     *
     * @return RegisteredUserSimpleProfile|NULL
     */
    public function getRegisteredUser(): ?RegisteredUserSimpleProfile {
        return $this->registeredUser;
    }

    protected function setRegisteredUser(array $registeredUser): void {
        $this->registeredUser = new RegisteredUserSimpleProfile($registeredUser);
    }

    /**
     * Returns the account registered user.
     *
     * @return MasterRef|NULL
     */
    public function getAccountRegisteredUser(): ?MasterRef {
        return $this->accountRegisteredUser;
    }

    protected function setAccountRegisteredUser(array $masterRef): void {
        $this->accountRegisteredUser = MasterRefFactory::getElement($masterRef);
    }
}
