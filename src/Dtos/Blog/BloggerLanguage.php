<?php

namespace SDK\Dtos\Blog;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementIndexableTrait;

/**
 * This is the Blogger Language class.
 * The language information of API bloggers will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\Blog
 */
class BloggerLanguage extends PostBloggerLanguage {
    use ElementTrait, ElementDescriptionTrait, ElementIndexableTrait;
}
