<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementLanguageTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Interfaces\SEOElementInterface;

/**
 * This is the item Route metadata language class.
 * The Route metadata language will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see ElementLanguageTrait
 *
 * @package SDK\Dtos\Common
 */
class RouteMetadataLanguage extends Element implements SEOElementInterface {
    use ElementTrait, ElementLanguageTrait;

}
