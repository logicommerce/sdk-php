<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the basket shipment class.
 * The basket shipments information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketShipment::getShipping()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class BasketShipment extends BaseShipment {
    use ElementTrait;

    protected ?Shipping $shipping = null;

    /**
     * Returns the shipment shipping.
     *
     * @return Shipping
     */
    public function getShipping(): ?Shipping {
        return $this->shipping;
    }

    protected function setShipping(array $shipping): void {
        $this->shipping = new Shipping($shipping);
    }
}
