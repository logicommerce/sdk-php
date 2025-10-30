<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Blog;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\CatalogItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\SortableItemsParametersGroupTrait;
use SDK\Core\Resources\Date;
use SDK\Services\Parameters\Validators\Blog\BlogPostParametersValidator;

/**
 * This is the blog model (blog posts resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Blog
 */
class BlogPostParametersGroup extends ParametersGroup {
    use CatalogItemsParametersGroupTrait, SortableItemsParametersGroupTrait, PaginableItemsParametersGroupTrait;

    protected int $categoryId;

    protected int $bloggerId;

    protected int $tagId;

    protected string $fromDate;

    protected string $toDate;

    protected int $randomItems;

    protected string $q;

    /**
     * Sets the category internal identifier parameter for this parameters group.
     *
     * @param int $CategoryId
     *
     * @return void
     */
    public function setCategoryId(int $categoryId): void {
        $this->categoryId = $categoryId;
    }

    /**
     * Sets the blogger internal identifier parameter for this parameters group.
     *
     * @param int $bloggerId
     *
     * @return void
     */
    public function setBloggerId(int $bloggerId): void {
        $this->bloggerId = $bloggerId;
    }

    /**
     * Sets the tag internal identifier parameter for this parameters group.
     *
     * @param int $tagId
     *
     * @return void
     */
    public function setTagId(int $tagId): void {
        $this->tagId = $tagId;
    }

    /**
     * Sets a start date for this parameters group.
     *
     * @param \DateTime $date
     *
     * @return void
     */
    public function setFromDate(\DateTime $fromDate): void {
        $this->fromDate = $fromDate->format(Date::DATE_FORMAT);
    }

    /**
     * Sets a end date for this parameters group.
     *
     * @param \DateTime $date
     *
     * @return void
     */
    public function setToDate(\DateTime $toDate): void {
        $this->toDate = $toDate->format(Date::DATE_FORMAT);
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
    protected function getValidator(): BlogPostParametersValidator {
        return new BlogPostParametersValidator();
    }
}
