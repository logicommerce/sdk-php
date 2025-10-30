<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the session wishlist aggregate data class.
 * The session wishlist aggregate data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SessionAggregateWishlist::getItems()
 * @see SessionAggregateWishlist::getItemIdList()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos
 */
class SessionAggregateWishlist extends Element {
    use ElementTrait;

    protected int $items = 0;

    protected array $itemIdList = [];

    /**
     * Returns the wishlist total of items.
     *
     * @return int
     */
    public function getItems(): int {
        return $this->items;
    }

    /**
     * Returns a list of preoduct internal identifiers that belongs to the products the wishlist is made of.
     *
     * @return int[]
     */
    public function getItemIdList(): array {
        return $this->itemIdList;
    }
}
