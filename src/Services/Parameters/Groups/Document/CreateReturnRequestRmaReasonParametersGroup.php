<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Document;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Document\CreateReturnRequestRmaReasonParametersValidator;

/**
 * This is the document items parameters group class.
 *
 * @see ParametersGroup
 * 
 * @uses IdentifiableItemsParametersGroupTrait
 * 
 * @package SDK\Services\Parameters\Groups\Document
 */
class CreateReturnRequestRmaReasonParametersGroup extends ParametersGroup {
    use IdentifiableItemsParametersGroupTrait;

    protected string $comment;


    /**
     * Sets the comment parameter for this parameters group.
     *
     * @param string $comment
     *
     * @return void
     */
    public function setComment(string $comment): void {
        $this->comment = $comment;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CreateReturnRequestRmaReasonParametersValidator {
        return new CreateReturnRequestRmaReasonParametersValidator();
    }
}
