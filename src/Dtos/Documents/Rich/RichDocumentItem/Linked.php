<?php

namespace SDK\Dtos\Documents\Rich\RichDocumentItem;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rich\RichDocumentItem;

/**
 * This is the rich Linked item class.
 * the Linked item will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentItem
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich\RichDocumentItem
 */
class Linked extends RichDocumentItem {
    use ElementTrait;

    protected int $linkedParentId = 0;

    /**
     * Returns the linked parent id.
     *
     * @return int
     */
    public function getLinkedParentId(): int {
        return $this->linkedParentId;
    }
    
}
