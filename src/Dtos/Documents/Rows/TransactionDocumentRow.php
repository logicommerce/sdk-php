<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\OrderDetailType;

/**
 * This is the transaction document row class.
 * The transaction document rows will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TransactionDocumentRow::getFromShoppingListRow()
 * @see TransactionDocumentRow::getSale()
 * @see TransactionDocumentRow::getWeight()
 * @see TransactionDocumentRow::getOnRequest()
 * @see TransactionDocumentRow::getOnRequestDays()
 * @see TransactionDocumentRow::getPrices()
 *
 * @see DocumentRow
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
abstract class TransactionDocumentRow extends DocumentRow {
    use EnumResolverTrait;

    protected int $fromShoppingListRow = 0;

    protected bool $offer = false;

    protected float $weight = 0;

    protected bool $onRequest = false;

    protected int $onRequestDays = 0;

    protected ?DocumentRowPrices $prices = null;

    protected bool $reserve = false;

    protected string $type = '';

    /**
     * Returns the from shopping list row.
     *
     * @return int
     */
    public function getFromShoppingListRow(): int {
        return $this->fromShoppingListRow;
    }

    /**
     * Returns whether the product included in the detail line is on offer.
     *
     * @return bool
     */
    public function getOffer(): bool {
        return $this->offer;
    }

    /**
     * Returns the weight of the item. Default in kilograms, but it depends on the general configuration established.
     *
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * Returns a boolean indicating if the 'onRequest' setting was enabled for the product at the time the order was created. This setting determines if a product can be served on-request when it is out of stock. If activated, out-of-stock product units will be served on-request, provided the store and product have 'stock management' enabled and the product has its stock lines defined.
     *
     * @return bool
     */
    public function getOnRequest(): bool {
        return $this->onRequest;
    }

    /**
     * Returns the 'onRequestDays' setting value for the product at the time the order was created. This setting indicates the number of preparation days required for the product if it is to be served on-request. This duration is utilized to calculate and display an estimated departure date under these circumstances.
     *
     * @return int
     */
    public function getOnRequestDays(): int {
        return $this->onRequestDays;
    }

    /**
     * Returns the row prices information.
     *
     * @return DocumentRowPrices|NULL
     */
    public function getPrices(): ?DocumentRowPrices {
        return $this->prices;
    }

    protected function setPrices(array $prices): void {
        $this->prices = new DocumentRowPrices($prices);
    }

    /**
     * Returns that the product is in reserve.
     *
     * @return bool
     */
    public function getReserve(): bool {
        return $this->reserve;
    }

    /**
     * Returns type of document detail line.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(OrderDetailType::class, $this->type, '');
    }
}
