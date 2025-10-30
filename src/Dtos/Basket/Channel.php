<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the channel class.
 * The channels information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class Channel {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait;
}
