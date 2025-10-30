<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the sales agent totals class.
 * The asales agent totals will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SalesAgentTotals::getTotalAmount()
 * @see SalesAgentTotals::getCommissionAmount()
 * @see SalesAgentTotals::getPendingAmount()
 * @see SalesAgentTotals::getTotalOrders()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class SalesAgentTotals extends Element {
    use ElementTrait;

    protected float $totalAmount = 0.0;

    protected float $commissionAmount = 0.0;
    
    protected float $pendingAmount = 0.0;

    protected int $totalOrders = 0;


    /**
     * Returns the total amount value
     *
     * @return float
     */
    public function getTotalAmount(): float {
        return $this->totalAmount;
    }

    /**
     * Returns the commision amount value
     *
     * @return float
     */
    public function getCommissionAmount(): float {
        return $this->commissionAmount;
    }

    /**
     * Returns the pending amount value
     *
     * @return float
     */
    public function getPendingAmount(): float {
        return $this->pendingAmount;
    }

    /**
     * Returns the total orders value
     *
     * @return int
     */
    public function getTotalOrders(): int {
        return $this->totalOrders;
    }

}
