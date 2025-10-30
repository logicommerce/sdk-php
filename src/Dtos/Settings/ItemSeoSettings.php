<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementLanguageTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Interfaces\SEOElementInterface;

/**
 * This is the item SEO settings class.
 * The item SEO settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see ElementLanguageTrait
 *
 * @package SDK\Dtos\Settings
 */
class ItemSeoSettings extends Element implements SEOElementInterface {
    use ElementTrait, ElementLanguageTrait;

}
