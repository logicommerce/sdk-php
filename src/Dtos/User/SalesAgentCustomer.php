<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the sales agent customer class.
 * The asales agent customer will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SalesAgentCustomer::getId()
 * @see SalesAgentCustomer::getUser()
 * @see SalesAgentCustomer::getSalesAgent()
 * @see SalesAgentCustomer::getSalesAgentTotals()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\User
 */
class SalesAgentCustomer extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected ?User $user = null;

    protected ?SalesAgentHeaderToRemove $salesAgent = null;

    protected ?SalesAgentTotals $salesAgentTotals = null;

    /**
     * Returns the user
     *
     * @return NULL|User
     */
    public function getUser(): User {
        return $this->user;
    }

    protected function setUser(array $user): void {
        $this->user = new User($user);
    }

    /**
     * Returns sales agent totals
     *
     * @return NULL|SalesAgentTotals
     */
    public function getSalesAgentTotals(): ?SalesAgentTotals {
        return $this->salesAgentTotals;
    }

    protected function setSalesAgentTotals(array $salesAgentTotals): void {
        $this->salesAgentTotals = new SalesAgentTotals($salesAgentTotals);
    }

    /**
     * Returns sales agent header
     *
     * @return NULL|SalesAgentHeaderToRemove
     */
    public function getSalesAgent(): ?SalesAgentHeaderToRemove {
        return $this->salesAgent;
    }

    protected function setSalesAgent(array $salesAgent): void {
        $this->salesAgent = new SalesAgentHeaderToRemove($salesAgent);
    }

    /**
     * Returns if own customer
     *
     * @return string
     */
    public function isOwnCustomer(int $salesAgentId): bool {
        return $this->salesAgent !== null && $this->salesAgent->getId() === $salesAgentId;
    }
}
