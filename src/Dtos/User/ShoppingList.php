<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the user shopping list main class.
 * The user shopping list information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ShoppingList::getKeepPurchasedItems()
 * @see ShoppingList::getDefaultOne()
 * @see ShoppingList::getPriority()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\User
 */
class ShoppingList extends Element {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait, ElementDescriptionTrait, IntegrableElementTrait;

    protected bool $keepPurchasedItems = false;

    protected bool $defaultOne = false;

    protected int $priority = 0;


    /**
     * Specifies whether the rows of the shopping list are automatically deleted from the shopping list when their items are purchased though them
     *
     * @return bool
     */
    public function getKeepPurchasedItems(): bool {
        return $this->keepPurchasedItems;
    }

    /**
     * Specifies whether this shopping list is the default one.
     *
     * @return bool
     */
    public function getDefaultOne(): bool {
        return $this->defaultOne;
    }

    /**
     * Specifies the order of presentation of this item in relation to the rest of items of the same type.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }
}
