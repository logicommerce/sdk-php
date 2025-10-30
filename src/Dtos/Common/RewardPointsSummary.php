<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the RewardPointsSummary class.
 * The RewardPointsSummary of API items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RewardPointsSummary::getTotalByUnits()
 * @see RewardPointsSummary::getTotalByAmount()
 * @see RewardPointsSummary::getTotalRedeemed()
 * @see RewardPointsSummary::getTotalEarned()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class RewardPointsSummary {
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
     * Returns the total redeemed.
     *
     * @return int
     */
    public function getTotalRedeemed(): int {
        return $this->totalRedeemed;
    }

    /**
     * Returns the total earned.
     *
     * @return int
     */
    public function getTotalEarned(): int {
        return $this->totalEarned;
    }

}
