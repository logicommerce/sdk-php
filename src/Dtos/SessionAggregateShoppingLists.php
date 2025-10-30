<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the session aggregate shopping lists data class.
 * The session aggregate shopping list data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SessionAggregateShoppingLists::getDefaultOne()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos
 */
class SessionAggregateShoppingLists extends Element {
    use ElementTrait;

    protected ?SessionAggregateShoppingList $defaultOne = null;

    /**
     * Returns the default one shopping list
     *
     * @return SessionAggregateShoppingList|null
     */
    public function getDefaultOne(): ?SessionAggregateShoppingList {
        return $this->defaultOne;
    }

    protected function setDefaultOne(array $defaultOne): void {
        $this->defaultOne = new SessionAggregateShoppingList($defaultOne);
    }
}
