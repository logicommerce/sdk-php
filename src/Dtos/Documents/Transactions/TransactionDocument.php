<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Factories\DocumentDeliveryFactory;
use SDK\Core\Dtos\Factories\DocumentTaxDefinitionFactory;
use SDK\Core\Dtos\Factories\TransactionDocumentRowFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Document;
use SDK\Dtos\Documents\Rows\TransactionDocumentRow;
use SDK\Dtos\Documents\Transactions\Deliveries\DocumentDelivery;

/**
 * This is the transaction document class.
 * The transaction documents will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TransactionDocument::getCurrencies()
 * @see TransactionDocument::getTaxes()
 * @see TransactionDocument::getDelivery()
 * @see TransactionDocument::getComment()
 * @see TransactionDocument::getItems()
 * @see TransactionDocument::getTotals()
 *
 * @see Document
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
abstract class TransactionDocument extends Document {
    use ElementTrait;

    protected array $currencies = [];

    protected ?DocumentDelivery $delivery = null;

    protected string $comment = '';

    protected array $items = [];

    protected ?DocumentTotal $totals = null;

    protected string $substatus = '';

    protected float $total = 0.0;

    /**
     * Returns information on currency records.
     *
     * @return DocumentCurrency[]
     */
    public function getCurrencies(): array {
        return $this->currencies;
    }

    protected function setCurrencies(array $currencies): void {
        $this->currencies = $this->setArrayField($currencies, DocumentCurrency::class);
    }

    /**
     * Returns information about the delivery.
     *
     * @return DocumentDelivery|NULL
     */
    public function getDelivery(): ?DocumentDelivery {
        return $this->delivery;
    }

    protected function setDelivery(array $delivery): void {
        $this->delivery = DocumentDeliveryFactory::getElement($delivery);
    }

    /**
     * Returns the document comment.
     *
     * @return string
     */
    public function getComment(): string {
        return $this->comment;
    }

    /**
     * Returns the document rows.
     *
     * @return TransactionDocumentRow[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, TransactionDocumentRowFactory::class);
    }

    /**
     * Returns the document totals.
     *
     * @return DocumentTotal|NULL
     */
    public function getTotals(): ?DocumentTotal {
        return $this->totals;
    }

    protected function setTotals(array $totals): void {
        $this->totals = new DocumentTotal($totals);
    }

    /**
     * Returns current substatus of the document. Only for documents of type Order or RMA, otherwise NULL.
     *
     * @return string
     */
    public function getSubstatus(): string {
        return $this->substatus;
    }

    /**
     * Returns the total amount of the document.
     *
     * @return float
     */
    public function getTotal(): float {
        return $this->total;
    }
}
