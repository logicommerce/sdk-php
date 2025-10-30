<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the sales agent details class.
 * The asales agent details will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SalesAgentDetails::getTotalAmount()
 * @see SalesAgentDetails::getCommissionAmount()
 * @see SalesAgentDetails::getCommissionPaid()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class SalesAgentDetails extends Element {
    use ElementTrait;

    protected float $totalAmount = 0.0;

    protected float $commissionAmount = 0.0;
    
    protected bool $commissionPaid = false;


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
     * Returns if the commision is paid
     *
     * @return bool
     */
    public function getCommissionPaid(): bool {
        return $this->commissionPaid;
    }

}
