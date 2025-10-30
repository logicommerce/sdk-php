<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Element;

/**
 * This is the query motive class.
 * The query motives items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos
 */
class QueryMotive extends Element{
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait, ElementDescriptionTrait;
}
