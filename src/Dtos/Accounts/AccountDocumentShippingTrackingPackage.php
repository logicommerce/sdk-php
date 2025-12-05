<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Element;

/**
 * This is the account document shipping tracking package main class.
 * The shipping tracking package information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see AccountDocumentShippingTrackingPackage::getTrackingURL()
 * @see AccountDocumentShippingTrackingPackage::getWeight()
 * @see AccountDocumentShippingTrackingPackage::getWeightUnits()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Accounts
 */

class AccountDocumentShippingTrackingPackage extends Element {
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
