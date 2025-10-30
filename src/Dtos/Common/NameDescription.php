<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the name description class.
 * The API name description will be stored in that class and will remain immutable (only get methods are available)
 *
 * @uses ElementTrait
 * @uses ElementNameTrait
 * @uses ElementDescriptionTrait
 *
 * @package SDK\Dtos\Common
 */
class NameDescription {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait;
}
