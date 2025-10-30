<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Status class.
 * If the API returns is a void item with headers, this will be the response object.
 * The needed data will be stored here and remain immutable (only get methods are available)
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class Status extends Element {
    use ElementTrait;
}
