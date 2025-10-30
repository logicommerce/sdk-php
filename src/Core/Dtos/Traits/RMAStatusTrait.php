<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

use SDK\Enums\RMAStatus;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the date added elements trait.
 *
 * @see RMAStatusTrait::getStatus()
 * @see RMAStatusTrait::getSubstatusId()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait RMAStatusTrait {
    use EnumResolverTrait;

    protected string $status = '';

    protected int $substatusId = 0;
    
    /**
     * Returns the document status.
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->getEnum(RMAStatus::class, $this->status, RMAStatus::INCIDENTS);
    }

    /**
     * Returns the document substatus id.
     *
     * @return int
     */
    public function getSubstatusId(): int {
        return $this->substatusId;
    }
}
