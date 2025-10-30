<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the session productComparison aggregate data class.
 * The session productComparison aggregate data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SessionAggregateProductComparison::getItems()
 * @see SessionAggregateProductComparison::getItemIdList()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos
 */
class SessionAggregateProductComparison extends Element {
    use ElementTrait;

    protected int $items = 0;

    protected array $itemIdList = [];

    /**
     * Returns the productComparison total of items.
     *
     * @return int
     */
    public function getItems(): int {
        return $this->items;
    }

    /**
     * Returns a list of preoduct internal identifiers that belongs to the products the productComparison is made of.
     *
     * @return int[]
     */
    public function getItemIdList(): array {
        return $this->itemIdList;
    }
}
