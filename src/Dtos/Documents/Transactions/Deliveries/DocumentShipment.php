<?php

namespace SDK\Dtos\Documents\Transactions\Deliveries;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Resources\Date;
use SDK\Dtos\Documents\Rows\DocumentShipmentRow;
use SDK\Enums\DocumentShipmentStatusType;

/**
 * This is the document shipment class.
 * The document shipment will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentShipment::getStatus()
 * @see DocumentShipment::getSubstatusId()
 * @see DocumentShipment::getOriginaleWarehouseGroupId()
 * @see DocumentShipment::getPhysicalLocationId()
 * @see DocumentShipment::getIncomingDate()
 * @see DocumentShipment::getShipping()
 * @see DocumentShipment::getTrackingNumber()
 * @see DocumentShipment::getTrackingUrl()
 * @see DocumentShipment::getItems()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Deliveries
 */
class DocumentShipment extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, EnumResolverTrait;

    protected string $status = '';

    protected int $substatusId = 0;

    protected int $originWarehouseGroupId = 0;

    protected int $physicalLocationId = 0;

    protected ?Date $incomingDate = null;

    protected ?DocumentShipping $shipping = null;

    protected string $trackingNumber = '';

    protected string $trackingUrl = '';

    protected array $items = [];

    /**
     * Returns the shipment status.
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->getEnum(DocumentShipmentStatusType::class, $this->status, '');
    }

    /**
     * Returns internal identifier of the current substatus of the shhipment.
     *
     * @return int
     */
    public function getSubstatusId(): int {
        return $this->substatusId;
    }

    /**
     * Returns identifier of the logistic center originating the shipment.
     *
     * @return int
     */
    public function getOriginWarehouseGroupId(): int {
        return $this->originWarehouseGroupId;
    }

    /**
     * Returns internal pickup point identifier.
     *
     * @return int
     * @deprecated 2404-001
     */
    public function getPhysicalLocationId(): int {
        return $this->physicalLocationId;
    }

    /**
     * Returns the document shipment incoming date.
     *
     * @return Date|null
     */
    public function getIncomingDate(): ?Date {
        return $this->incomingDate;
    }

    public function setIncomingDate(string $incomingDate): void {
        $this->incomingDate = Date::create($incomingDate);
    }

    /**
     * Returns information about the shipping.
     *
     * @return DocumentShipping
     */
    public function getShipping(): ?DocumentShipping {
        return $this->shipping;
    }

    protected function setShipping(array $shipping): void {
        $this->shipping = new DocumentShipping($shipping);
    }

    /**
     * Returns shipment tracking code.
     *
     * @return string
     */
    public function getTrackingNumber(): string {
        return $this->trackingNumber;
    }

    /**
     * Returns URL for tracking the order offered by the carrier.
     *
     * @return string
     */
    public function getTrackingUrl(): string {
        return $this->trackingUrl;
    }

    /**
     * Returns information about the items in the shipment.
     *
     * @return DocumentShipmentRow[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, DocumentShipmentRow::class);
    }
}
