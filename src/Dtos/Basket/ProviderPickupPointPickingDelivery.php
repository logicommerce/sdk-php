<?php

namespace SDK\Dtos\Basket;


/**
 * This is the basket base ProviderPickupPointPickingDelivery class.
 * The base prices information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProviderPickupPointPickingDelivery::getPickupPointProviderId()
 * @see ProviderPickupPointPickingDelivery::getProviderPickupPoint()
 *
 * @see PickingDeliveryMode
 *
 * @package SDK\Dtos\Basket
 */
class ProviderPickupPointPickingDelivery extends PickingDeliveryMode {

    protected int $pickupPointProviderId = 0;

    protected ?ProviderPickupPoint $providerPickupPoint = null;

    /**
     * Returns pickupPointProviderId.
     *
     * @return int
     */
    public function getPickupPointProviderId(): int {
        return $this->pickupPointProviderId;
    }

    /**
     * Returns the providerPickupPoint.
     *
     * @return null|ProviderPickupPoint
     */
    public function getProviderPickupPoint(): ?ProviderPickupPoint {
        return $this->providerPickupPoint;
    }

    protected function setProviderPickupPoint($providerPickupPoint) {
        $this->providerPickupPoint = new ProviderPickupPoint($providerPickupPoint);
    }
}
