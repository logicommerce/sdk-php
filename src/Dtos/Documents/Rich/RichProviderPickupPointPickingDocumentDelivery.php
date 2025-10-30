<?php

namespace SDK\Dtos\Documents\Rich;

/**
 * This is the rich shipping document delivery class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichPickingModeDocumentDelivery
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichProviderPickupPointPickingDocumentDelivery extends RichPickingModeDocumentDelivery {

    protected ?RichDocumentPickupPointProvider $pickupPointProvider = null;

    protected ?RichDocumentProviderPickupPoint $providerPickupPoint = null;

    /**
     * Returns the rich provider pickup point document delivery
     *
     * @return RichDocumentPickupPointProvider|NULL
     */
    public function getPickupPointProvider(): ?RichDocumentPickupPointProvider {
        return $this->pickupPointProvider;
    }

    protected function setPickupPointProvider(array $pickupPointProvider): void {
        $this->pickupPointProvider = new RichDocumentPickupPointProvider($pickupPointProvider);
    }

    /**
     * Returns the rich provider pickup point document delivery
     *
     * @return RichDocumentProviderPickupPoint|NULL
     */
    public function getProviderPickupPoint(): ?RichDocumentProviderPickupPoint {
        return $this->providerPickupPoint;
    }

    protected function setProviderPickupPoint(array $providerPickupPoint): void {
        $this->providerPickupPoint = new RichDocumentProviderPickupPoint($providerPickupPoint);
    }
}
