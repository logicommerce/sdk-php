<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the main document headquarter class.
 * The document headquarter will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentHeadquarter::getHeadquarterId()
 * @see DocumentHeadquarter::getAddress()
 * @see DocumentHeadquarter::getCity()
 * @see DocumentHeadquarter::getState()
 * @see DocumentHeadquarter::getVat()
 * @see DocumentHeadquarter::getPostalCode()
 * @see DocumentHeadquarter::getPhone()
 * @see DocumentHeadquarter::getEmail()
 * @see DocumentHeadquarter::getLogo()
 * @see DocumentHeadquarter::getCountryCode()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Documents
 */
class DocumentHeadquarter extends Element {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait;

    protected int $headquarterId = 0;

    protected string $address = '';

    protected string $city = '';

    protected string $state = '';

    protected string $vat = '';

    protected string $postalCode = '';

    protected string $phone = '';

    protected string $email = '';

    protected string $logo = '';

    protected string $countryCode = '';

    /**
     * Returns internal identifier of the invoicing company.
     *
     * @return int
     */
    public function getHeadquarterId(): int {
        return $this->headquarterId;
    }

    /**
     * Returns invoicing company address.
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * Returns invoicing company city.
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * Returns invoicing company province or state.
     *
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }

    /**
     * Returns tax number of the invoicing company.
     *
     * @return string
     */
    public function getVat(): string {
        return $this->vat;
    }

    /**
     * Returns Invoicing company zip code.
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }

    /**
     * Returns invoicing company phone.
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns invoicing company email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns invoicing company logo.
     *
     * @return string
     */
    public function getLogo(): string {
        return $this->logo;
    }

    /**
     * Returns country code in ISO 3166-2 format.
     *
     * @return string
     */
    public function getCountryCode(): string {
        return $this->countryCode;
    }
}
