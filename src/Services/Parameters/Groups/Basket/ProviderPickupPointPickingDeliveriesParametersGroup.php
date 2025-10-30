<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\ProviderPickupPointPickingDeliveriesParametersValidator;

/**
 * This is the basket model (base for ProviderPickupPointPickingDeliveries resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class ProviderPickupPointPickingDeliveriesParametersGroup extends ParametersGroup {

    protected int $pickupPointProviderId;

    protected string $countryCode;

    protected string $postalCode;

    protected string $city;

    protected float $latitude;

    protected float $longitude;

    protected float $radius;

    /**
     * Sets the pickupPointProviderId parameter for this parameters group.
     *
     * @param int $pickupPointProviderId
     *
     * @return void
     */
    public function setPickupPointProviderId(int $pickupPointProviderId): void {
        $this->pickupPointProviderId = $pickupPointProviderId;
    }

    /**
     * Sets the countryCode parameter for this parameters group.
     *
     * @param string $countryCode
     *
     * @return void
     */
    public function setCountryCode(string $countryCode): void {
        $this->countryCode = $countryCode;
    }

    /**
     * Sets the postalCode parameter for this parameters group.
     *
     * @param string $postalCode
     *
     * @return void
     */
    public function setPostalCode(string $postalCode): void {
        $this->postalCode = $postalCode;
    }

    /**
     * Sets the city parameter for this parameters group.
     *
     * @param string $city
     *
     * @return void
     */
    public function setCity(string $city): void {
        $this->city = $city;
    }

    /**
     * Sets the latitude parameter for this parameters group.
     *
     * @param float $latitude
     *k
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
     * Sets the radius parameter for this parameters group.
     *
     * @param float $radius
     *
     * @return void
     */
    public function setRadius(float $radius): void {
        $this->radius = $radius;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ProviderPickupPointPickingDeliveriesParametersValidator {
        return new ProviderPickupPointPickingDeliveriesParametersValidator();
    }
}
