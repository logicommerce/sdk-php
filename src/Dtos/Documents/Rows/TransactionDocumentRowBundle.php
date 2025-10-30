<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the transaction document row bundle class.
 * The transaction document row bundles will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TransactionDocumentRowBundle::getItems()
 * @see TransactionDocumentRowBundle::getBundleGroupingId()
 *
 * @see TransactionDocumentRow
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
class TransactionDocumentRowBundle extends TransactionDocumentRow {
    use ElementTrait;

    protected array $items = [];

    /**
     * Returns information about the document detail lines.
     *
     * @return TransactionDocumentSingleRow[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, TransactionDocumentSingleRow::class);
    }
}
