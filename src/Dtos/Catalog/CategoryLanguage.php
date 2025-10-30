<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\CategoryLanguage as CoreCategoryLanguage;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Category Language class.
 * The language information of API categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CategoryLanguage::getLongDescription()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class CategoryLanguage extends CoreCategoryLanguage {
    use ElementTrait;

    protected string $longDescription = '';

    /**
     * Returns the category long description for the website current language.
     *
     * @return string
     */
    public function getLongDescription(): string {
        return $this->longDescription;
    }
}
