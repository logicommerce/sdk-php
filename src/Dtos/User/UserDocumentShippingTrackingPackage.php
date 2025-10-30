<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Element;

/**
 * This is the user returns request main class.
 * The user returns request information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserDocumentShippingTrackingPackage::getTrackingURL()
 * @see UserDocumentShippingTrackingPackage::getWeight()
 * @see UserDocumentShippingTrackingPackage::getWeightUnits()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class UserDocumentShippingTrackingPackage extends Element {
    use ElementTrait;

    protected string $trackingURL = '';

    protected int $weight = 0;

    protected string $weightUnits = '';

    /**
     * Returns the shipment tracking url.
     *
     * @return string
     */
    public function getTrackingURL(): string {
        return $this->trackingURL;
    }

    /**
     * Returns the package weight.
     *
     * @return int
     */
    public function getWeight(): int {
        return $this->weight;
    }

    /**
     * Returns the package weight units.
     *
     * @return string
     */
    public function getWeightUnits(): string {
        return $this->weightUnits;
    }
}
