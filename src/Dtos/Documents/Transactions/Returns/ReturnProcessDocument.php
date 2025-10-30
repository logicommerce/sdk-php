<?php

namespace SDK\Dtos\Documents\Transactions\Returns;

use SDK\Core\Dtos\Factories\ReturnProcessDocumentRowFactory;
use SDK\Dtos\Documents\Transactions\TransactionDocument;

/**
 * This is the return process document class.
 * The return process documents will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ReturnProcessDocument::getAdditionalItems()
 * @see ReturnProcessDocument::getItems()
 *
 * @see TransactionDocument
 *
 * @package SDK\Dtos\Documents\Transactions\Returns
 */
abstract class ReturnProcessDocument extends TransactionDocument {

    protected array $additionalItems = [];

    /**
     * Returns additional concepts that affect the price of the document.
     *
     * @return DocumentAdditionalItem[]
     */
    public function getAdditionalItems(): array {
        return $this->additionalItems;
    }

    protected function setAdditionalItems(array $additionalItems): void {
        $this->additionalItems = $this->setArrayField($additionalItems, DocumentAdditionalItem::class);
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, ReturnProcessDocumentRowFactory::class);
    }
}
