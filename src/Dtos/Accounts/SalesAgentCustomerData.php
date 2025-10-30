<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\AccountFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Dtos\User\SalesAgentTotals;

/**
 * This is the sales agent customer class.
 * The asales agent customer will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SalesAgentCustomerData::getId()
 * @see SalesAgentCustomerData::getAccount()
 * @see SalesAgentCustomerData::getSalesAgentTotals()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see AccountFactory
 *
 * @package SDK\Dtos\Accounts
 */
class SalesAgentCustomerData extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected ?Account $account = null;

    protected ?SalesAgentTotals $salesAgentTotals = null;

    protected ?SalesAgentHeader $salesAgent = null;

    /**
     * Returns the account
     *
     * @return NULL|Account
     */
    public function getAccount(): Account {
        return $this->account;
    }

    protected function setAccount(array $account): void {
        $this->account = AccountFactory::getElement($account);
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
     * Returns sales agents
     *
     * @return @return NULL|SalesAgentHeader
     */
    public function getSalesAgent(): SalesAgentHeader {
        return $this->salesAgent;
    }

    protected function setSalesAgent(array $salesAgent): void {
        $this->salesAgent = new SalesAgentHeader($salesAgent);
    }
}
