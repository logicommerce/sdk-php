<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DeliveryType;

/**
 * This is the rich document delivery class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentDelivery::getType()
 * @see RichDocumentDelivery::getShipments()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
abstract class RichDocumentDelivery extends Element {
    use ElementTrait, EnumResolverTrait;

    protected string $type = '';

    protected array $shipments = [];

    /**
     * Returns the rich document delivery type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(DeliveryType::class, $this->type, DeliveryType::SHIPPING);
    }

    /**
     * Returns the rich document delivery shipments.
     *
     * @return RichDocumentShipment[]
     */
    public function getShipments(): array {
        return $this->shipments;
    }

    protected function setShipments(array $shipments): void {
        $this->shipments = $this->setArrayField($shipments, RichDocumentShipment::class);
    }
}
