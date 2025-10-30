<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the user returns request main class.
 * The user returns request information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserDocumentShipment::getTrackingURL()
 * @see UserDocumentShipment::getTrackingNumber()
 * @see UserDocumentShipment::getPickupDate()
 * @see UserDocumentShipment::getPackageS()
 *
 * @see Element
 *
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * @uses IntegrableElementTrait
 * 
 * @package SDK\Dtos\User
 */
class UserDocumentShipment extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected string $trackingURL = '';

    protected string $trackingNumber = '';

    protected string $pickupDate = '';

    protected array $packages = [];

    /**
     * Returns the shipment tracking url.
     *
     * @return string
     */
    public function getTrackingURL(): string {
        return $this->trackingURL;
    }

    /**
     * Returns the shipment tracking number.
     *
     * @return string
     */
    public function getTrackingNumber(): string {
        return $this->trackingNumber;
    }

    /**
     * Returns the shipment pickup date.
     *
     * @return string
     */
    public function getPickupDate(): string {
        return $this->pickupDate;
    }

    /**
     * Returns the user shipment package.
     *
     * @return UserDocumentShippingTrackingPackage[]
     */
    public function getPackages(): array {
        return $this->packages;
    }

    protected function setPackages(array $packages): void {
        $this->packages = $this->setArrayField($packages, UserDocumentShippingTrackingPackage::class);
    }

}
