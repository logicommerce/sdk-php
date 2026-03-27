<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\MassiveProductRowPinnedParametersValidator;

/**
 * This is the basket Massive Product Row Pinned Parameters Group class, which contains an array of MassiveProductRowPinnedItemParametersGroup objects as a parameter for the pinning of multiple product rows in the cart.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class MassiveProductRowPinnedParametersGroup extends ParametersGroup {

    protected array $items;

    /**
     * Sets an array of items as a parameter for this parameters group.
     *
     * @param MassiveProductRowPinnedItemParametersGroup[] $items
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
     * @param MassiveProductRowPinnedItemParametersGroup $item
     *
     * @return void
     */
    public function addItem(MassiveProductRowPinnedItemParametersGroup $item): void {
        $this->items ??= [];
        $this->items[] = $item;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): MassiveProductRowPinnedParametersValidator {
        return new MassiveProductRowPinnedParametersValidator();
    }
}
