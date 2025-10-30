<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Location;

/**
 * This is the basket base ProviderPickupPoint class.
 * The base prices information will be stored in that class and will remain immutable (only get methods are available)
 * 
 * @see ProviderPickupPoint::getKey()
 * @see ProviderPickupPoint::getName()
 * @see ProviderPickupPoint::getEmail()
 * @see ProviderPickupPoint::getCity()
 * @see ProviderPickupPoint::getPostalCode()
 * @see ProviderPickupPoint::getAddress()
 * @see ProviderPickupPoint::getAddressAdditionalInformation()
 * @see ProviderPickupPoint::getNumber()
 * @see ProviderPickupPoint::getPhone()
 * @see ProviderPickupPoint::getMobile()
 * @see ProviderPickupPoint::getUrl()
 * @see ProviderPickupPoint::getLocation()
 * @see ProviderPickupPoint::getOpeningTimes()
 * @see ProviderPickupPoint::getOpeningTimesAdditionalInformation()
 * @see ProviderPickupPoint::getUpcomingHolidayClosurePeriodsAdditionalInformation()
 * @see ProviderPickupPoint::getUpcomingHolidayClosurePeriods()
 * @see ProviderPickupPoint::getDistance()
 * @see ProviderPickupPoint::getAdditionalData()
 * @see ProviderPickupPoint::getHash()
 *
 * @uses ElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Basket
 */
class ProviderPickupPoint {
    use ElementTrait, EnumResolverTrait;

    protected string $key = '';

    protected string $name = '';

    protected string $email = '';

    protected string $city = '';

    protected string $postalCode = '';

    protected string $address = '';

    protected string $addressAdditionalInformation = '';

    protected string $number = '';

    protected string $phone = '';

    protected string $mobile = '';

    protected string $url = '';

    protected ?Location $location = null;

    protected ?OpeningTimes $openingTimes = null;

    protected string $openingTimesAdditionalInformation = '';

    protected array $upcomingHolidayClosurePeriods = [];

    protected string $upcomingHolidayClosurePeriodsAdditionalInformation = '';

    protected float $distance = 0.0;

    protected array $additionalData = [];

    protected string $hash  = '';

    /**
     * Returns the key
     *
     * @return string
     */
    public function getKey(): string {
        return $this->key;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the city
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * Returns the postalCode
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }

    /**
     * Returns the address
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * Returns the addressAdditionalInformation
     *
     * @return string
     */
    public function getAddressAdditionalInformation(): string {
        return $this->addressAdditionalInformation;
    }

    /**
     * Returns the number
     *
     * @return string
     */
    public function getNumber(): string {
        return $this->number;
    }

    /**
     * Returns the phone
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns the mobile
     *
     * @return string
     */
    public function getMobile(): string {
        return $this->mobile;
    }

    /**
     * Returns the url
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * Returns the location.
     *
     * @return Location|NULL
     */
    public function getLocation(): ?Location {
        return $this->location;
    }

    protected function setLocation(array $location): void {
        $this->location = new Location($location);
    }

    /**
     * Returns the openingTimes
     *
     * @return OpeningTimes|NULL
     */
    public function getOpeningTimes(): ?OpeningTimes {
        return $this->openingTimes;
    }

    protected function setOpeningTimes(array $openingTimes): void {
        $this->openingTimes = new OpeningTimes($openingTimes);
    }

    /**
     * Returns the openingTimesAdditionalInformation
     *
     * @return string
     */
    public function getOpeningTimesAdditionalInformation(): string {
        return $this->openingTimesAdditionalInformation;
    }

    /**
     * Returns the upcomingHolidayClosurePeriodsAdditionalInformation
     *
     * @return string
     */
    public function getUpcomingHolidayClosurePeriodsAdditionalInformation(): string {
        return $this->upcomingHolidayClosurePeriodsAdditionalInformation;
    }

    /**
     * Returns the upcomingHolidayClosurePeriods.
     *
     * @return ClosurePeriod[]
     */
    public function getUpcomingHolidayClosurePeriods(): array {
        return $this->upcomingHolidayClosurePeriods;
    }

    protected function setUpcomingHolidayClosurePeriods(array $upcomingHolidayClosurePeriods): void {
        $this->upcomingHolidayClosurePeriods = $this->setArrayField($upcomingHolidayClosurePeriods, ClosurePeriod::class);
    }

    /**
     * Returns distance.
     *
     * @return float
     */
    public function getDistance(): float {
        return $this->distance;
    }

    /**
     * Returns the additionalData
     *
     * @return array
     */
    public function getAdditionalData(): array {
        return $this->additionalData;
    }

    /**
     * Returns the hash
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }
}
