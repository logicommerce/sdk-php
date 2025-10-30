<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the theme trait.
 *
 * @see SalesAgentTrait::getSalesAgent()
 * @see SalesAgentTrait::getSalesAgentId()
 * @see SalesAgentTrait::getSalesAgentRegisteredUserId()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait SalesAgentTrait {

    protected bool $salesAgent = false;

    protected int $salesAgentId = 0;

    protected int $salesAgentRegisteredUserId = 0;

    /**
     * Returns the element salesAgent data.
     *
     * @return bool
     */
    public function getSalesAgent(): bool {
        return $this->salesAgent;
    }

    /**
     * Returns the element salesAgentId data.
     *
     * @return int
     */
    public function getSalesAgentId(): int {
        return $this->salesAgentId;
    }

    protected function setSalesAgentId(int $salesAgentId): void {
        $this->salesAgentId = $salesAgentId;
    }

    /**
     * Returns the element salesAgentRegisteredUserId data.
     *
     * @return int
     */
    public function getSalesAgentRegisteredUserId(): int {
        return $this->salesAgentRegisteredUserId;
    }
}
