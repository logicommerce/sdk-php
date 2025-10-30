<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DocumentShipmentStatusType;

/**
 * This is the rich document shipment class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentShipment::getGetpId()
 * @see RichDocumentShipment::getStatus()
 * @see RichDocumentShipment::getSubstatus()
 * @see RichDocumentShipment::getOriginWarehouseGroupName()
 * @see RichDocumentShipment::getPhysicalLocationName()
 * @see RichDocumentShipment::getIncomingDate()
 * @see RichDocumentShipment::getItems()
 * @see RichDocumentShipment::getShipping()
 * @see RichDocumentShipment::getTrackingNumber()
 * @see RichDocumentShipment::getTrackingUrl()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentShipment extends Element{
    use ElementTrait, EnumResolverTrait;
    
    protected string $getpId = '';

    protected string $status = '';

    protected string $substatus = '';

    protected string $originWarehouseGroupName = '';

    protected string $physicalLocationName = '';

    protected string $incomingDate = '';
    
    protected array $items = [];

    protected ?RichDocumentShipping $shipping = null;

    protected string $trackingNumber = '';

    protected string $trackingUrl = '';

    /**
     * Returns the rich document shipment getpId.
     *
     * @return string
     */
    public function getGetpId(): string {
        return $this->getpId;
    }

    /**
     * Returns the rich document shipment status.
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->getEnum(DocumentShipmentStatusType::class, $this->status, DocumentShipmentStatusType::PENDING);
    }

    /**
     * Returns the rich document shipment substatus.
     *
     * @return string
     */
    public function getSubstatus(): string {
        return $this->substatus;
    }

    /**
     * Returns the rich document shipment originWarehouseGroupName.
     *
     * @return string
     */
    public function getOriginWarehouseGroupName(): string {
        return $this->originWarehouseGroupName;
    }

    /**
     * Returns the rich document shipment physicalLocationName.
     *
     * @return string
     */
    public function getPhysicalLocationName(): string {
        return $this->physicalLocationName;
    }

    /**
     * Returns the rich document shipment incomingDate.
     *
     * @return string
     */
    public function getIncomingDate(): string {
        return $this->incomingDate;
    }

    /**
     * Returns the rich document shipment items. 
     *
     * @return RichDocumentShipmentItem[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, RichDocumentShipmentItem::class);
    }

    /**
     * Returns the rich document shipment shipping.
     *
     * @return RichDocumentShipping|NULL
     */
    public function getShipping(): ?RichDocumentShipping {
        return $this->shipping;
    }

    protected function setShipping(array $shipping): void {
        $this->shipping = new RichDocumentShipping($shipping);
    }

    /**
     * Returns the rich document shipment trackingNumber.
     *
     * @return string
     */
    public function getTrackingNumber(): string {
        return $this->trackingNumber;
    }

    /**
     * Returns the rich document shipment trackingUrl.
     *
     * @return string
     */
    public function getTrackingUrl(): string {
        return $this->trackingUrl;
    }
}
