<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Factories\DocumentAppliedTaxFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Documents\DocumentCustomTag;
use SDK\Dtos\Documents\Transactions\DocumentAppliedTax;
use SDK\Dtos\Documents\Transactions\DocumentDiscount;
use SDK\Enums\BackorderMode;

/**
 * This is the transaction document single row class.
 * The transaction document single rows will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TransactionDocumentSingleRow::getLink()
 * @see TransactionDocumentSingleRow::getStockManagement()
 * @see TransactionDocumentSingleRow::getNoReturn()
 * @see TransactionDocumentSingleRow::getBackorderMode()
 * @see TransactionDocumentSingleRow::getBrandName()
 * @see TransactionDocumentSingleRow::getLinkedParentId()
 * @see TransactionDocumentSingleRow::getStocks()
 * @see TransactionDocumentSingleRow::getDiscounts()
 * @see TransactionDocumentSingleRow::getCustomTags()
 * @see TransactionDocumentSingleRow::getTaxes()
 * @see TransactionDocumentSingleRow::getOptions()
 *
 * @see TransactionDocumentRow
 * @see ElementTrait
 * @see EnumResolverTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
class TransactionDocumentSingleRow extends TransactionDocumentRow {
    use ElementTrait, EnumResolverTrait;

    protected string $link = '';

    protected bool $stockManagement = false;

    protected bool $noReturn = false;

    protected string $backOrder = '';

    protected string $brandName = '';

    protected int $linkedParentId = 0;

    protected array $stocks = [];

    protected array $discounts = [];

    protected array $customTags = [];

    protected array $taxes = [];

    protected array $options = [];

    protected bool $onRequestAffected = false;

    /**
     * Returns the link.
     *
     * @return string
     */
    public function getLink(): string {
        return $this->link;
    }

    /**
     * Returns whether the product included in the detail line has stock management enabled, effective only when stock management is generally activated.
     *
     * @return bool
     */
    public function getStockManagement(): bool {
        return $this->stockManagement;
    }

    /**
     * Returns whether the product included in the detail line can be returned.
     *
     * @return bool
     */
    public function getNoReturn(): bool {
        return $this->noReturn;
    }

    /**
     * Returns the reserve work method (sell inventory without stock) for the product included in the detail line.
     *
     * @return string
     */
    public function getBackorder(): string {
        return $this->getEnum(BackorderMode::class, $this->backOrder, '');
    }

    /**
     * Returns the brand name.
     *
     * @return string
     */
    public function getBrandName(): string {
        return $this->brandName;
    }

    /**
     * Returns internal identifier of the parent product when the product that is part of the detail line is linked.
     *
     * @return int
     */
    public function getLinkedParentId(): int {
        return $this->linkedParentId;
    }

    /**
     * Returns information about the stock of the document detail line.
     *
     * @return DocumentRowStock[]
     */
    public function getStocks(): array {
        return $this->stocks;
    }

    protected function setStocks(array $stocks): void {
        $this->stocks = $this->setArrayField($stocks, DocumentRowStock::class);
    }

    /**
     * Returns information about discounts in the detail line.
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
     * Returns information about product custom tags included in the document detail line.
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
     * Returns information about the taxes associated with the document detail line.
     *
     * @return DocumentAppliedTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, DocumentAppliedTaxFactory::class);
    }

    /**
     * Returns information about the product options included in the document detail line.
     *
     * @return TransactionDocumentRowOption[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, TransactionDocumentRowOption::class);
    }

    /**
     * Returns that some unit of the product on the detail line is served on-request.
     *
     * @return bool
     */
    public function getOnRequestAffected(): bool {
        return $this->onRequestAffected;
    }
}
