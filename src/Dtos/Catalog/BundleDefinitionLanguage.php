<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the Bundle Definition Language class.
 * The language information of API Bundle Definition Language will be stored in that class and will remain immutable (only get methods are available)
 *
 * @uses ElementTrait
 * @uses ElementNameTrait
 * @uses ElementDescriptionTrait
 *
 * @package SDK\Dtos\Catalog
 */
class BundleDefinitionLanguage {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait;

}
