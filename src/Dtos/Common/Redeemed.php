<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Common\RewardPointsRedeemedRule;

/**
 * This is the Redeemed class.
 * The Redeemed of API items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Redeemed::getToRedeem
 * @see Redeemed::getRules()
 *
 * @see ElementTrait
 * 
 *
 * @package SDK\Dtos\Catalog\Product
 */
class Redeemed {
    use ElementTrait;

    protected int $toRedeem = 0;

    protected array $rules = [];

    /**
     * Returns the to redeem value.
     *
     * @return int
     */
    public function getToRedeem(): int {
        return $this->toRedeem;
    }

    /**
     * Returns the rules values.
     *
     * @return RewardPointsRedeemedRule[]
     */
    public function getRules(): array {
        return $this->rules;
    }

    protected function setRules(array $rules): void {
        $this->rules = $this->setArrayField($rules, RewardPointsRedeemedRule::class);
    }

}
