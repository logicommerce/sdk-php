<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rows\DeliveryNoteDocumentRow;

/**
 * This is the delivery note class.
 * The delivery note will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DeliveryNote::getItems()
 *
 * @see Document
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents
 */
class DeliveryNote extends Document {
    use ElementTrait;

    protected array $items = [];

    /**
     * Returns items of the document.
     *
     * @return DeliveryNoteDocumentRow[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, DeliveryNoteDocumentRow::class);
    }
}
