<?php

namespace SDK\Dtos\Common\DiscountConditions;

use SDK\Core\Dtos\BaseDiscountCondition;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the DiscountConditionValue class.
 *
 * @see DiscountConditionValue::getMet()
 * @see DiscountConditionValue::getDays()
 * @see DiscountConditionValue::getQuantity()
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class DiscountConditionValue extends BaseDiscountCondition {
    use ElementTrait, EnumResolverTrait;

    protected ?bool $met = null;

    protected int $from = 0;

    protected int $to = 0;

    protected string $valueType = '';

    protected string $mode = '';

    /**
     * Specifies if the condition is met. Null means that the condition can not be evaluated.
     *
     * @return bool|NULL
     */
    public function getMet(): ?bool {
        return $this->met;
    }

    /**
     * 'From' quantity for modes FROM and RANGE, and 'quantity' for mode EACH.
     *
     * @return int
     */
    public function getFrom(): int {
        return $this->from;
    }

    /**
     * 'To' quantity. Only applies to RANGE mode.
     *
     * @return int
     */
    public function getTo(): int {
        return $this->to;
    }

    /**
     * Specifies the condition value type.
     * <ul>
     * <li>UNITS: condition based on the units added to the order.</li>
     * <li>NUM_ORDERS: condition based on the number of orders the user has made.</li>
     * <li>AMOUNT_SPENT: condition based on the total amount of the order.</li>
     * </ul>
     * 
     * @return int
     */
    public function getValueType(): int {
        return $this->getEnum(DiscountConditionValueType::class, $this->valueType, '');
    }

    /**
     * Specifies the condition value mode.
     *
     * @return int
     */
    public function getMode(): int {
        return $this->getEnum(DiscountConditionMode::class, $this->mode, '');
    }
}
