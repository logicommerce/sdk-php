<?php

namespace SDK\Dtos\Basket;

use SDK\Dtos\Basket\Delivery;

/**
 * This is the BasketDelivery class.
 * The basket delivery information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Delivery
 *
 * @package SDK\Dtos\Basket
 */
abstract class BasketDelivery extends Delivery {

    protected bool $canBeShipped = false;
}
