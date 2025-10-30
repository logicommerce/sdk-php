<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the Custom Tag Language class.
 * The language information of API custom tags will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Core\Dtos
 */
class CustomTagLanguage {
    use ElementTrait, ElementNameTrait;
}
