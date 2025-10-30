<?php

namespace SDK\Dtos\Documents\Transactions\Returns;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the document RMA Reason item class.
 * The document RMA Reason items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RMAReason::getRequiresComment()
 * @see RMAReason::getLanguage()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Returns
 */
class RMAReason extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected bool $requiresComment = false;

    protected ?RMAReasonLanguage $language = null;

    /**
     * Returns the requiresComment.
     *
     * @return bool
     */
    public function getRequiresComment(): bool {
        return $this->requiresComment;
    }

    /**
     * Returns the language.
     *
     * @return RMAReasonLanguage|NULL
     */
    public function getLanguage(): ?RMAReasonLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new RMAReasonLanguage($language);
    }
}
