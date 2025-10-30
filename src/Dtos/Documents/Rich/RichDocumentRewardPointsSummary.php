<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document reward point earned class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentRewardPointsSummary::getTotalByUnits()
 * @see RichDocumentRewardPointsSummary::getTotalByAmount()
 * @see RichDocumentRewardPointsSummary::getTotalRedeemed()
 * @see RichDocumentRewardPointsSummary::getTotalEarned()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentRewardPointsSummary extends Element{
    use ElementTrait;

    protected int $totalByUnits = 0;

    protected int $totalByAmount = 0;

    protected int $totalRedeemed = 0;

    protected int $totalEarned = 0;
    
    /**
     * Returns the total by units.
     *
     * @return int
     */
    public function getTotalByUnits(): int {
        return $this->totalByUnits;
    }

    /**
     * Returns the total by amount.
     *
     * @return int
     */
    public function getTotalByAmount(): int {
        return $this->totalByAmount;
    }
    
    /**
     * Returns the total by redeemed.
     *
     * @return int
     */
    public function getTotalRedeemed(): int {
        return $this->totalRedeemed;
    }

    /**
     * Returns the total by earned.
     *
     * @return int
     */
    public function getTotalEarned(): int {
        return $this->totalEarned;
    }
}









