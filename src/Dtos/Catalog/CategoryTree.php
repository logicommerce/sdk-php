<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Category as CoreCategory;
use SDK\Core\Dtos\Traits\CatalogCustomTagValueTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Category Tree class.
 * The information of API Category Trees will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CategoryTree::getLanguage
 * @see CategoryTree::getSubcategories
 *
 * @see CoreCategory
 * @see ElementTrait
 * @see CatalogCustomTagValueTrait
 *
 * @package SDK\Dtos\Catalog
 */
class CategoryTree extends CoreCategory {
    use ElementTrait, CatalogCustomTagValueTrait;

    protected ?CategoryTreeLanguage $language = null;

    protected array $subcategories = [];

    /**
     * Returns the category tree language object.
     *
     * @see CategoryTreeLanguage
     * @return CategoryTreeLanguage|NULL
     */
    public function getLanguage(): ?CategoryTreeLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new CategoryTreeLanguage($language);
    }

    /**
     * Returns the category subcategories.
     *
     * @return static[]
     */
    public function getSubcategories(): array {
        return $this->subcategories;
    }

    protected function setSubcategories(array $subcategories): void {
        $this->subcategories = $this->setArrayField($subcategories, static::class);
    }

}
