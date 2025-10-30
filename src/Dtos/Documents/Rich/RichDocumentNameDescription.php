<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the name description class.
 * The API name description will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses ElementNameTrait
 * @uses ElementDescriptionTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentNameDescription extends Element {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait;
}
