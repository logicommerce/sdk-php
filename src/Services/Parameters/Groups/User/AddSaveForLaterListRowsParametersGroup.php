<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\AddSaveForLaterListRowsParametersValidator;

/**
 * This is the add save for later list rows parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class AddSaveForLaterListRowsParametersGroup extends ParametersGroup {
    protected array $items;

    /**
     * Sets the parameter block with the information about each shopping list row to be added to the 'save for later list'.
     *
     * @param AddSaveForLaterListRowParametersGroup[] $items
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
     * Adds a new the parameter block with the information about each shopping list row to be added to the 'save for later list'.
     *
     * @param AddSaveForLaterListRowParametersGroup $item
     *
     * @return void
     */
    public function addItem(AddSaveForLaterListRowParametersGroup $item): void {
        $this->items ??= [];
        $this->items[] = $item;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddSaveForLaterListRowsParametersValidator {
        return new AddSaveForLaterListRowsParametersValidator();
    }
}
