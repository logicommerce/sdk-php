<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the rich document item class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichReturnProcessDocumentRow::getRmaReason()
 *
 * @see RichDocumentItem
 * 
 * @uses ElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
abstract class RichReturnProcessDocumentRow extends RichDocumentItem {
    use ElementTrait, EnumResolverTrait;

    protected ?RichReturnProcessDocumentRowRMAReason $rmaReason = null;

    /**
     * Returns the rich document item rmaReason.
     *
     * @return RichReturnProcessDocumentRowRMAReason|NULL
     */
    public function getRmaReason(): ?RichReturnProcessDocumentRowRMAReason {
        return $this->rmaReason;
    }

    protected function setRmaReason(array $rmaReason): void {
        $this->rmaReason = new RichReturnProcessDocumentRowRMAReason($rmaReason);
    }
}
