<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Rich Provider PickupPoint Picking Document Delivery PickupPointProvider class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichPickingModeDocumentDelivery
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentPickupPointProvider extends Element {
    use ElementTrait;

    protected string $pickupPointProviderPId = '';

    protected string $name = '';

    /**
     * Returns the pickupPointProviderPId
     *
     * @return string
     */
    public function getPickupPointProviderPId(): string {
        return $this->pickupPointProviderPId;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
}
