<?php

namespace SDK\Dtos\Documents\Transactions\Returns;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\RMAStatus;

/**
 * This is the RMA class.
 * The RMA will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RMA::getStatus()
 * @see RMA::getSubstatusId()
 *
 * @see ReturnProcessDocument
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Returns
 */
class RMA extends ReturnProcessDocument {
    use ElementTrait, EnumResolverTrait;

    protected string $status = '';

    protected int $substatusId = 0;

    /**
     * Returns current status of the document.
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->getEnum(RMAStatus::class, $this->status, '');
    }

    /**
     * Returns internal identifier of the substatus of the document.
     *
     * @return int
     */
    public function getSubstatusId(): int {
        return $this->substatusId;
    }
}
