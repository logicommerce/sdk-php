<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Delivery as CoreDelivery;

/**
 * This is the Delivery class.
 * The basket  Delivery information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Delivery
 *
 * @package SDK\Dtos\Basket
 */
class Delivery extends CoreDelivery {

    protected bool $selected = false;

    /**
     * Returns if the delivery is the selected one.
     *
     * @return bool
     */
    public function getSelected(): bool {
        return $this->selected;
    }
}
