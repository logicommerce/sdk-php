<?php

namespace SDK\Dtos\Common\DiscountConditions;

use SDK\Core\Dtos\BaseDiscountCondition;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DiscountConditionRestrictionType;

/**
 * This is the DiscountConditionRestriction class.
 *
 * @see DiscountConditionRestriction::getRestrictionType()
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class DiscountConditionRestriction extends BaseDiscountCondition {
    use ElementTrait, EnumResolverTrait;

    protected string $restrictionType = '';

    /**
     * Specifies the restriction type of the condition.
     *
     * @return string
     */
    public function getRestrictionType(): string {
        return $this->getEnum(DiscountConditionRestrictionType::class, $this->restrictionType, '');
    }
}
