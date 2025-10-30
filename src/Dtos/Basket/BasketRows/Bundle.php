<?php

namespace SDK\Dtos\Basket\BasketRows;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\BasketRow;
use SDK\Dtos\Basket\BasketRows\Bundle\BundleItem;

/**
 * This is the basket item class.
 * The basket items information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Bundle::getItems()
 *
 * @see BasketRow
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class Bundle extends BasketRow {
    use ElementTrait;

    protected array $items = [];

    /**
     * Returns the basket items.
     *
     * @return BasketRow[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, BundleItem::class);
    }
}
