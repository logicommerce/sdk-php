<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\PickingDeliveryType;

/**
 * This is the basket base PickingDeliveryMode class.
 * The base prices information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PickingDeliveryMode::getType()
 *
 * @uses ElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Basket
 */
abstract class PickingDeliveryMode extends Element {
    use ElementTrait, EnumResolverTrait;

    protected string $type = '';

    /**
     * Returns the delivery type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(PickingDeliveryType::class, $this->type, PickingDeliveryType::PICKUP_POINT_PHYSICAL_LOCATION);
    }
}
