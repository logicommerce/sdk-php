<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Blog;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\CatalogItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Blog\BlogCategoryParametersValidator;

/**
 * This is the blog model (blog categories resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Blog
 */
class BlogCategoryParametersGroup extends ParametersGroup {
    use CatalogItemsParametersGroupTrait, PaginableItemsParametersGroupTrait;

    protected int $parentId;

    protected int $randomItems;

    protected string $q;

    /**
     * Sets the parent internal identifier parameter for this parameters group.
     *
     * @param int $parentId
     *
     * @return void
     */
    public function setParentId(int $parentId): void {
        $this->parentId = $parentId;
    }

    /**
     * Sets the random items parameter for this parameters group.
     *
     * @param int $randomItems
     *
     * @return void
     */
    public function setRandomItems(int $randomItems): void {
        $this->randomItems = $randomItems;
    }

    /**
     * Sets a search query parameter for this parameters group.
     *
     * @param string $q
     *
     * @return void
     */
    public function setQ(string $q): void {
        $this->q = $q;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): BlogCategoryParametersValidator {
        return new BlogCategoryParametersValidator();
    }
}
