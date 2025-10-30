<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Category as CoreCategory;
use SDK\Core\Dtos\Traits\CatalogCustomTagValueTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\DateAddedTrait;

/**
 * This is the Category class.
 * The information of API Categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Category::getParentId()
 * @see Category::getProductsFirst()
 * @see Category::getAreaId()
 * @see Category::getIncludeSubcategories()
 * @see Category::getFeatured()
 * @see Category::getOffer()
 * @see Category::getPriority()
 * @see Category::getLanguage()
 *
 * @see CoreCategory
 * @see ElementTrait
 * @see CatalogCustomTagValueTrait
 * @see DateAddedTrait
 *
 * @package SDK\Dtos\Catalog
 */
class Category extends CoreCategory {
    use ElementTrait, CatalogCustomTagValueTrait, DateAddedTrait;

    protected int $parentId = 0;

    protected bool $prodFirst = false;

    protected int $areaId = 0;

    protected bool $includeSubcategories = false;

    protected int $priority = 0;

    protected ?CategoryLanguage $language = null;

    /**
     * Returns the category parent identifier.
     *
     * @return int
     */
    public function getParentId(): int {
        return $this->parentId;
    }

    /**
     * Sets if when printing this category content the products will be printed before the subcategories.
     *
     * @return bool
     */
    public function getProdFirst(): bool {
        return $this->prodFirst;
    }

    /**
     * Returns the area id where this category belongs.
     *
     * @return int
     */
    public function getAreaId(): int {
        return $this->areaId;
    }

    /**
     * Sets if the subcategories must be printed or not when printing this category content.
     *
     * @return bool
     */
    public function getIncludeSubcategories(): bool {
        return $this->includeSubcategories;
    }

    /**
     * Returns the category priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the category language object.
     *
     * @see CategoryLanguage
     * @return CategoryLanguage|NULL
     */
    public function getLanguage(): ?CategoryLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new CategoryLanguage($language);
    }
}
