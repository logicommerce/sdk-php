<?php

namespace SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow;

/**
 * This is the rich bundle item class.
 * the bundle item will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichReturnProcessDocumentRow
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow
 */
class Bundle extends RichReturnProcessDocumentRow {
    use ElementTrait;

    protected array $items = [];

    /**
     * Returns the bundle row items.
     *
     * @return Product[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, Product::class);
    }
}
