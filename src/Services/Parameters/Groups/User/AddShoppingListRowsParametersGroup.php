<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\AddShoppingListRowsParametersValidator;

/**
 * This is the add shopping list row parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class AddShoppingListRowsParametersGroup extends ParametersGroup {

    protected array $items;

    /**
     * Sets an array of AddShoppingListRowParametersGroup
     *
     * @param AddShoppingListRowParametersGroup[] $items
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
     * Adds a new item to the array of items for this parameters group.
     *
     * @param AddShoppingListRowParametersGroup $item
     *
     * @return void
     */
    public function addItem(AddShoppingListRowParametersGroup $item): void {
        $this->items ??= [];
        $this->items[] = $item;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddShoppingListRowsParametersValidator {
        return new AddShoppingListRowsParametersValidator();
    }
}
