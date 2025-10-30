<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;

/**
 * This is the physical location parameters group class.
 *
 * @package SDK\Core\Services\Parameters\Groups
 */
abstract class PhysicalLocationParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $countryCode;

    protected string $state;

    protected string $city;

    protected string $postalCode;

    protected int $locationId;

    protected float $latitude;

    protected float $longitude;

    protected float $radius;

    protected string $idList;

    protected bool $visibleOnMap;

    protected bool $deliveryPoint;

    protected bool $returnPoint;

    /**
     * Country code in ISO 3166-2 format.
     *
     * @param string $countryCode
     *
     * @return void
     */
    public function setCountryCode(string $countryCode): void {
        $this->countryCode = $countryCode;
    }

    /**
     * Filter to obtain the PhysicalLocations whose state is the same as the indicated one.
     *
     * @param string $state
     *
     * @return void
     */
    public function setState(string $state): void {
        $this->state = $state;
    }

    /**
     * Filter to obtain those PhysicalLocations whose city is the same as the indicated one.
     *
     * @param string $city
     *
     * @return void
     */
    public function setCity(string $city): void {
        $this->city = $city;
    }

    /**
     * Filter to obtain those PhysicalLocations whose zip code is the same as the indicated one.
     *
     * @param string $postalCode
     *
     * @return void
     */
    public function setPostalCode(string $postalCode): void {
        $this->postalCode = $postalCode;
    }

    /**
     * Internal identifier of a subdivision of a country.
     *
     * @param int $locationId
     *
     * @return void
     */
    public function setLocationId(int $locationId): void {
        $this->locationId = $locationId;
    }

    /**
     * Sets the latitude parameter for this parameters group.
     *
     * @param float $latitude
     *
     * @return void
     */
    public function setLatitude(float $latitude): void {
        $this->latitude = $latitude;
    }

    /**
     * Sets the longitude parameter for this parameters group.
     *
     * @param float $longitude
     *
     * @return void
     */
    public function setLongitude(float $longitude): void {
        $this->longitude = $longitude;
    }

    /**
     * Specifies the distance radius in kilometers centering on the location described by the latitude and longitude values. 
     * Physical locations within this radius are obtained.
     *
     * @param float $radius
     *
     * @return void
     */
    public function setRadius(float $radius): void {
        $this->radius = $radius;
    }

    /**
     * Sets a list of internal identifiers for this parameters group.
     *
     * @param string $idList
     *
     * @return void
     */
    public function setIdList(string $idList): void {
        $this->idList = $idList;
    }

    /**
     * Sets if the elements will be filtered using this parameters group in function of if they are visible on map.
     *
     * @param bool $visibleOnMap
     *
     * @return void
     */
    public function setVisibleOnMap(bool $visibleOnMap): void {
        $this->visibleOnMap = $visibleOnMap;
    }

    /**
     * Sets if the elements will be filtered using this parameters group in function of if they are delivery points.
     *
     * @param bool $deliveryPoint
     *
     * @return void
     */
    public function setDeliveryPoint(bool $deliveryPoint): void {
        $this->deliveryPoint = $deliveryPoint;
    }

    /**
     * Sets if the elements will be filtered using this parameters group in function of if they are refund points.
     *
     * @param bool $returnPoint
     *
     * @return void
     */
    public function setReturnPoint(bool $returnPoint): void {
        $this->returnPoint = $returnPoint;
    }
}
