<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DeliveryType;
use SDK\Enums\PickingDeliveryType;

/**
 * This is the rich picking mode document delivery class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichPickingModeDocumentDelivery::getType()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
abstract class RichPickingModeDocumentDelivery extends Element {
    use ElementTrait, EnumResolverTrait;

    protected string $type = '';

    /**
     * Returns the rich document delivery type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(PickingDeliveryType::class, $this->type, PickingDeliveryType::PICKUP_POINT_PHYSICAL_LOCATION);
    }
}
