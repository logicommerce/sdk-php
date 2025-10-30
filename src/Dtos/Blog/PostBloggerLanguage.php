<?php

namespace SDK\Dtos\Blog;

use SDK\Core\Dtos\Traits\ElementIndexableTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;

/**
 * This is the Blogger Language class.
 * The language information of API bloggers will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see ElementLinkAttributesTrait
 *
 * @package SDK\Dtos\Blog
 */
class PostBloggerLanguage {
    use ElementTrait, ElementLinkAttributesTrait, ElementIndexableTrait;
}
