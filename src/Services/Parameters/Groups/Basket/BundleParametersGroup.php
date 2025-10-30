<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;

/**
 * This is the basket model (base for bundle resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
abstract class BundleParametersGroup extends ParametersGroup {

    protected int $quantity;

    protected array $items;

    protected int $fromShoppingListRow;

    /**
     * Sets the quantity parameter for this parameters group.
     *
     * @param int $quantity
     *
     * @return void
     */
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    /**	
     * Internal identifier of the shopping list row that has motivated this action. Useful parameter if you want to offer the 'KeepPurchasedItems' functionality of the shopping lists.Sets the quantity parameter for this parameters group.
     *
     * @param int $fromShoppingListRow
     *
     * @return void
     */
    public function setFromShoppingListRow(int $fromShoppingListRow): void {
        $this->fromShoppingListRow = $fromShoppingListRow;
    }

    /**
     * Sets an array of items as a parameter for this parameters group.
     *
     * @param BundleItemParametersGroup[] $items
     *
     * @return void
     */
    public function setItems(array $items): void {
        $this->items = [];
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    /**
     * Adds a new items to the array of items for this parameters group.
     *
     * @param BundleItemParametersGroup $item
     *
     * @return void
     */
    public function addItem(BundleItemParametersGroup $item): void {
        $this->items ??= [];
        $this->items[] = $item;
    }
}
