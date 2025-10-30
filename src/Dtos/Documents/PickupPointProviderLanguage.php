<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;

/**
 * This is the pickup point provider Language class.
 * The language information of API pickup point providers will be stored in that class and will remain immutable
 * (only get methods are available)
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\Documents
 */
class PickupPointProviderLanguage {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait;
}
