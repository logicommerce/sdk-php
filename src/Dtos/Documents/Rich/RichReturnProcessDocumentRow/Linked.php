<?php

namespace SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow;

/**
 * This is the rich Linked item class.
 * the Linked item will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichReturnProcessDocumentRow
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow
 */
class Linked extends RichReturnProcessDocumentRow {
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
