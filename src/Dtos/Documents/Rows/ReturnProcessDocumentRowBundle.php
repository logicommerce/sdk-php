<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the transaction document row bundle class.
 * The transaction document row bundles will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ReturnProcessDocumentRowBundle::getItems()
 * @see ReturnProcessDocumentRowBundle::getBundleGroupingId()
 *
 * @see ReturnProcessDocumentRow
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
class ReturnProcessDocumentRowBundle extends ReturnProcessDocumentRow {
    use ElementTrait;

    protected array $items = [];

    /**
     * Returns information about the document detail lines.
     *
     * @return ReturnProcessDocumentRow[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, ReturnProcessDocumentRow::class);
    }
}
