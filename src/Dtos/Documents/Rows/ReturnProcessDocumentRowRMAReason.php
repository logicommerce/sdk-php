<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Transaction Document Row RMA Reason class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ReturnProcessDocumentRowRMAReason::getRmaReasonId()
 * @see ReturnProcessDocumentRowRMAReason::getDescription()
 * @see ReturnProcessDocumentRowRMAReason::getComment()
 * @see ReturnProcessDocumentRowRMAReason::getRmaReasonPId()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class ReturnProcessDocumentRowRMAReason extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected int $rmaReasonId = 0;

    protected string $description = '';

    protected string $comment = '';

    protected string $rmaReasonPId = '';

    /**
     * Returns the rmaReasonId.
     * 
     * @return string
     */
    public function getRmaReasonId(): string {
        return $this->rmaReasonId;
    }

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
