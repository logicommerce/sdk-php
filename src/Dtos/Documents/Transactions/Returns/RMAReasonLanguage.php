<?php

namespace SDK\Dtos\Documents\Transactions\Returns;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the document RMA Reason language class.
 * The document RMA Reason language will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RMAReasonLanguage::getDescription()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Returns
 */
class RMAReasonLanguage {
    use ElementTrait;

    protected string $description = '';

    /**
     * Returns the description.
     *
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }
}
