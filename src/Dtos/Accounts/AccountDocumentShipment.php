<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the account shipment main class.
 * The account shipment information will be stored in that class and will remain immutable (only get methods are available)
 * 
 * @see AccountDocumentShipment::getTrackingURL()
 * @see AccountDocumentShipment::getTrackingNumber()
 * @see AccountDocumentShipment::getPickupDate()
 * @see AccountDocumentShipment::getPackageS()
 * 
 * @see Element
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * @uses IntegrableElementTrait
 * 
 * @package SDK\Dtos\Accounts
 */
class AccountDocumentShipment extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected string $trackingURL = '';

    protected string $pickupDate = '';

    protected string $trackingNumber = '';

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
     * Returns the account shipment package.
     *
     * @return AccountDocumentShippingTrackingPackage[]
     */
    public function getPackages(): array {
        return $this->packages;
    }

    protected function setPackages(array $packages): void {
        $this->packages = $this->setArrayField($packages, AccountDocumentShippingTrackingPackage::class);
    }
}
