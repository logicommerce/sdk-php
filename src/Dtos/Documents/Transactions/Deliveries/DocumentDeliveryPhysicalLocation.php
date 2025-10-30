<?php

namespace SDK\Dtos\Documents\Transactions\Deliveries;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\DocumentPhysicalLocation;

/**
 * This is the DocumentDeliveryPhysicalLocation class.
 * The Document Deliveries will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentPhysicalLocation::getCountry()
 * @see DocumentPhysicalLocation::getEmail()
 * @see DocumentPhysicalLocation::getPhone()
 *
 * @see Element
 * @see ElementTrait
 * @see DocumentPhysicalLocation
 *
 * @package SDK\Dtos\Documents
 */
class DocumentDeliveryPhysicalLocation extends DocumentPhysicalLocation {
    use ElementTrait;

    protected string $country = '';

    protected string $email = '';

    protected string $phone = '';

    /**
     * Returns the document delivery physical location country.
     *
     * @return string
     */
    public function getCountry(): string {
        return $this->country;
    }

    /**
     * Returns the document delivery physical location email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the document delivery physical location phone.
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

}
