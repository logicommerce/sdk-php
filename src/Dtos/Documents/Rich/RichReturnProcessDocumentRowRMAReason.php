<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Rich Document Item RMA Reason class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichReturnProcessDocumentRowRMAReason::getDescription()
 * @see RichReturnProcessDocumentRowRMAReason::getComment()
 * @see RichReturnProcessDocumentRowRMAReason::getRmaReasonPId()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichReturnProcessDocumentRowRMAReason extends Element {
    use ElementTrait;

    protected string $description = '';

    protected string $comment = '';

    protected string $rmaReasonPId = '';

    /**
     * Returns the description.
     * 
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * Returns the comment.
     * 
     * @return string
     */
    public function getComment(): string {
        return $this->comment;
    }

    /**
     * Returns the rmaReasonPId.
     * 
     * @return string
     */
    public function getRmaReasonPId(): string {
        return $this->rmaReasonPId;
    }
}
