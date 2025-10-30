<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the rich snippets list item section class.
 * The rich snippets list item section will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ListItem::getItem()
 *
 * @see RichSnippets
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Snippets
 */
class ListItem extends RichSnippets {
    use ElementTrait, ElementNameTrait;

    protected string $item = '';

    protected int $position = 0;

    /**
     * Returns the rich snippet list item.
     *
     * @return string
     */
    public function getItem(): string {
        return $this->item;
    }

    /**
     * Returns the rich snippet list position.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }
}
