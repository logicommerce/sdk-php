<?php

namespace SDK\Dtos\Documents\Transactions\Deliveries;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Basket\GeographicalZone;
use SDK\Enums\DeliveryType;

/**
 * This is the document delivery class.
 * The document delivery will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentDelivery::getType()
 * @see DocumentDelivery::getShipments()
 * @see DocumentDelivery::getGeographicalZone()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Deliveries
 */
class DocumentDelivery extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait;

    protected string $type = '';

    protected array $shipments = [];

    protected ?GeographicalZone $geographicalZone = null;

    /**
     * Returns the type of delivery.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(DeliveryType::class, $this->type, '');
    }

    /**
     * Returns information about shipment records.
     *
     * @return DocumentShipment[]
     */
    public function getShipments(): array {
        return $this->shipments;
    }

    protected function setShipments(array $shipments): void {
        $this->shipments = $this->setArrayField($shipments, DocumentShipment::class);
    }

    /**
     * Returns information about the geographical zone.
     *
     * @return GeographicalZone
     */
    public function getGeographicalZone(): ?GeographicalZone {
        return $this->geographicalZone;
    }

    protected function setGeographicalZone(array $geographicalZone): void {
        $this->geographicalZone = new GeographicalZone($geographicalZone);
    }
}
