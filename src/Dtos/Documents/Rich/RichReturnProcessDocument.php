<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Factories\RichReturnProcessDocumentRowFactory;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document ReturnProcess class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichReturnProcessDocument::getItems()
 *
 * @see RichDocument
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
abstract class RichReturnProcessDocument extends RichDocument {
    use ElementTrait;

    /**
     * Returns the rich document items.
     *
     * @return RichDocumentItem[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, RichReturnProcessDocumentRowFactory::class);
    }
}
