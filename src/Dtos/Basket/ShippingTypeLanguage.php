<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the shipping type language class.
 * The language information of API shipping types will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Basket
 */
class ShippingTypeLanguage {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait;

}
