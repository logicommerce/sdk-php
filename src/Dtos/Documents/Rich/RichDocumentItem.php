<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\RichDocumentElementTaxFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Catalog\Product\ProductCodes;
use SDK\Enums\BackorderMode;
use SDK\Enums\DocumentRowType;

/**
 * This is the rich document item class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentItem::getHash()
 * @see RichDocumentItem::getName()
 * @see RichDocumentItem::getLink()
 * @see RichDocumentItem::getQuantity()
 * @see RichDocumentItem::getPrices()
 * @see RichDocumentItem::getWeight()
 * @see RichDocumentItem::getDiscounts()
 * @see RichDocumentItem::getTaxes()
 * @see RichDocumentItem::getPptions()
 * @see RichDocumentItem::getStocks()
 * @see RichDocumentItem::getCustomTags()
 * @see RichDocumentItem::getLinkedParentId()
 * @see RichDocumentItem::getImage()
 * @see RichDocumentItem::getStockManagement()
 * @see RichDocumentItem::getReverseChargeVat()
 * @see RichDocumentItem::getCodes()
 * @see RichDocumentItem::getNoReturn()
 * @see RichDocumentItem::getBackOrder()
 * @see RichDocumentItem::getOnRequest()
 * @see RichDocumentItem::getOnRequestDays()
 * @see RichDocumentItem::getType()
 * @see RichDocumentItem::getReserve()
 * @see RichDocumentItem::getItemId()
 * @see RichDocumentItem::getOnRequestAffected()
 * @see RichDocumentItem::getBrandName()
 * @see RichDocumentItem::getOffer()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
abstract class RichDocumentItem extends Element {
    use ElementTrait, EnumResolverTrait;

    protected string $hash = '';

    protected string $name = '';

    protected string $link = '';

    protected int $quantity = 0;

    protected ?RichDocumentItemPrices $prices = null;

    protected float $weight = 0.0;

    protected array $discounts = [];

    protected array $taxes = [];

    protected array $options = [];

    protected array $stocks = [];

    protected array $customTags = [];

    protected int $linkedParentId = 0;

    protected string $image = '';

    protected bool $stockManagement = false;

    /**
     * @deprecated
     */
    protected bool $reverseChargeVat = false;

    protected ?ProductCodes $codes = null;

    protected bool $noReturn = false;

    protected string $backOrder = '';

    protected bool $onRequest = false;

    protected int $onRequestDays = 0;

    protected string $type = '';

    protected bool $reserve = false;

    protected int $itemId = 0;

    protected bool $onRequestAffected = false;

    protected string $brandName = '';

    protected bool $offer = false;

    /**
     * Returns the rich document item hash.
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }

    /**
     * Returns the rich document item name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the rich document item link.
     *
     * @return string
     */
    public function getLink(): string {
        return $this->link;
    }

    /**
     * Returns the rich document item quantity.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns the rich document item prices.
     *
     * @return RichDocumentItemPrices|NULL
     */
    public function getPrices(): ?RichDocumentItemPrices {
        return $this->prices;
    }

    protected function setPrices(array $prices): void {
        $this->prices = new RichDocumentItemPrices($prices);
    }

    /**
     * Returns the rich document item weight.
     *
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * Returns the rich document item discounts.
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
     * Returns the rich document item taxes.
     *
     * @return RichDocumentElementTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, RichDocumentElementTaxFactory::class);
    }

    /**
     * Returns the rich document item options.
     *
     * @return RichDocumentItemOption[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, RichDocumentItemOption::class);
    }

    /**
     * Returns the rich document item stocks.
     *
     * @return RichDocumentItemStock[]
     */
    public function getStocks(): array {
        return $this->stocks;
    }

    protected function setStocks(array $stocks): void {
        $this->stocks = $this->setArrayField($stocks, RichDocumentItemStock::class);
    }

    /**
     * Returns the rich document item stocks.
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
     * Returns the rich document item linked parent id.
     *
     * @return int
     */
    public function getLinkedParentId(): int {
        return $this->linkedParentId;
    }

    /**
     * Returns the rich document item image.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Returns the rich document item stockManagement.
     *
     * @return bool
     */
    public function getStockManagement(): bool {
        return $this->stockManagement;
    }

    /**
     * Returns the rich document item reverseChargeVat.
     *
     * @deprecated
     * @return bool
     */
    public function getReverseChargeVat(): bool {
        return $this->reverseChargeVat;
    }

    /**
     * Returns the rich document item codes.
     *
     * @return ProductCodes|NULL
     */
    public function getCodes(): ?ProductCodes {
        return $this->codes;
    }

    protected function setCodes(array $codes): void {
        $this->codes = new ProductCodes($codes);
    }

    /**
     * Returns the rich document item noReturn.
     *
     * @return bool
     */
    public function getNoReturn(): bool {
        return $this->noReturn;
    }

    /**
     * Returns the rich document item backOrder.
     *
     * @return string
     */
    public function getBackOrder(): string {
        return $this->getEnum(BackorderMode::class, $this->backOrder, BackorderMode::NONE);
    }

    /**
     * Returns the rich document item onRequest.
     *
     * @return bool
     */
    public function getOnRequest(): bool {
        return $this->onRequest;
    }

    /**
     * Returns the rich document item onRequestDays.
     *
     * @return int
     */
    public function getOnRequestDays(): int {
        return $this->onRequestDays;
    }

    /**
     * Returns the rich document item type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(DocumentRowType::class, $this->type, DocumentRowType::PRODUCT);
    }

    /**
     * Returns the rich document item reserve.
     *
     * @return bool
     */
    public function getReserve(): bool {
        return $this->reserve;
    }

    /**
     * Returns the rich document item itemId.
     *
     * @return int
     */
    public function getItemId(): int {
        return $this->itemId;
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
     * Returns the basket item brand name for the website current language.
     *
     * @return string
     */
    public function getBrandName(): string {
        return $this->brandName;
    }

    /**
     * Returns if the product row was buyed as an offer.
     *
     * @return bool
     */
    public function getOffer(): bool {
        return $this->offer;
    }
}
