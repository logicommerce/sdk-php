<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Basket\RewardPointsRedeemParametersValidator;

/**
 * This is the reward points redeem parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class RewardPointsRedeemParametersGroup extends ParametersGroup {
    use IdentifiableItemsParametersGroupTrait;

    protected int $value;

    /**
     * Sets the value parameter for this parameters group.
     *
     * @param int $value
     *
     * @return void
     */
    public function setValue(int $value): void {
        $this->value = $value;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): RewardPointsRedeemParametersValidator {
        return new RewardPointsRedeemParametersValidator();
    }
}
