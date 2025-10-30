<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementIndexableTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;

/**
 * This is the Area Language class.
 * The language information of API areas will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 * @see ElementLinkAttributesTrait
 * @see ElementUrlSeoTrait
 *
 * @package SDK\Dtos\Catalog
 */
class AreaLanguage {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait, ElementLinkAttributesTrait, ElementUrlSeoTrait, ElementIndexableTrait;
}
