<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document headquarter class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentHeadquarter::getName()
 * @see RichDocumentHeadquarter::getAddress()
 * @see RichDocumentHeadquarter::getCity()
 * @see RichDocumentHeadquarter::getState()
 * @see RichDocumentHeadquarter::getVat()
 * @see RichDocumentHeadquarter::getPostalCode()
 * @see RichDocumentHeadquarter::getPhone()
 * @see RichDocumentHeadquarter::getEmail()
 * @see RichDocumentHeadquarter::getCountryCode()
 * @see RichDocumentHeadquarter::getCountryName()
 * @see RichDocumentHeadquarter::getLogo()
 * @see RichDocumentHeadquarter::getTimeZone()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentHeadquarter extends Element{
    use ElementTrait;

    protected string $name = '';
    
    protected string $address = '';
    
    protected string $city = '';
    
    protected string $state = '';
    
    protected string $vat = '';
    
    protected string $postalCode = '';
    
    protected string $phone = '';
    
    protected string $email = '';
        
    protected string $countryCode = '';

    protected string $countryName = '';

    protected string $logo = '';

    protected string $timeZone = '';

    /**
     * Returns the rich document headquarter name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the rich document headquarter address.
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * Returns the rich document headquarter city.
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * Returns the rich document headquarter state.
     *
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }

    /**
     * Returns the rich document headquarter vat.
     *
     * @return string
     */
    public function getVat(): string {
        return $this->vat;
    }

    /**
     * Returns the rich document headquarter postalCode.
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }

    /**
     * Returns the rich document headquarter phone.
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns the rich document headquarter email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the rich document headquarter countryCode.
     *
     * @return string
     */
    public function getCountryCode(): string {
        return $this->countryCode;
    }

    /**
     * Returns the rich document headquarter countryName.
     *
     * @return string
     */
    public function getCountryName(): string {
        return $this->countryName;
    }

    /**
     * Returns the invoicing company logo
     *
     * @return string
     */
    public function getLogo(): string {
        return $this->logo;  
    }

    /**
     * Returns the invoicing company timeZone
     *
     * @return string
     */
    public function getTimeZone(): string {
        return $this->timeZone;  
    }

}
