<?php

namespace SDK\Dtos\Common\DiscountConditions;

use SDK\Core\Dtos\BaseDiscountCondition;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\ShippingType;

/**
 * This is the DiscountConditionShippingType class.
 *
 * @see DiscountConditionShippingType::getShippingTypes()
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class DiscountConditionShippingType extends BaseDiscountCondition {
    use ElementTrait;

    protected array $shippingTypes = [];

    /**
     * Information about the shipping types accepted by this condition.
     *
     * @return ShippingType[]
     */
    public function getShippingTypes(): array {
        return $this->shippingTypes;
    }

    protected function setShippingTypes(array $shippingTypes): void {
        $this->shippingTypes = $this->setArrayField($shippingTypes, ShippingType::class);
    }
}
