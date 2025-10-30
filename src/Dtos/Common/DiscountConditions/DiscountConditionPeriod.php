<?php

namespace SDK\Dtos\Common\DiscountConditions;

use SDK\Core\Dtos\BaseDiscountCondition;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the DiscountConditionPeriod class.
 *
 * @see DiscountConditionPeriod::getMet()
 * @see DiscountConditionPeriod::getDays()
 * @see DiscountConditionPeriod::getQuantity()
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class DiscountConditionPeriod extends BaseDiscountCondition {
    use ElementTrait;

    protected ?bool $met = null;

    protected int $days = 0;

    protected int $quantity = 0;

    /**
     * Specifies if the condition is met. Null means that the condition can not be evaluated.
     *
     * @return bool|NULL
     */
    public function getMet(): ?bool {
        return $this->met;
    }

    /**
     * Returns the specified days
     *
     * @return int
     */
    public function getDays(): int {
        return $this->days;
    }

    /**
     * Maximum number of times the discount is applicable between the last specified days.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }
}
