<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\CategoryLanguage as CoreCategoryLanguage;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Category Tree Language class.
 * The language information of API categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CoreCategoryLanguage
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class CategoryTreeLanguage extends CoreCategoryLanguage {
    use ElementTrait;
}
