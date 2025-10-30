<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Blog;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\SortableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Blog\BlogPostCommentsParametersValidator;

/**
 * This is the blog model (blogger resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Blog
 */
class BlogPostCommentsParametersGroup extends ParametersGroup {
    use SortableItemsParametersGroupTrait, PaginableItemsParametersGroupTrait;

    protected int $id;

    protected bool $showAllLanguages;

    /**
     * Sets the internal identifier parameter for this parameters group.
     *
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * Sets the show all languages parameter for this parameters group.
     *
     * @param bool $showAllLanguages
     *
     * @return void
     */
    public function setShowAllLanguages(bool $showAllLanguages): void {
        $this->showAllLanguages = $showAllLanguages;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): BlogPostCommentsParametersValidator {
        return new BlogPostCommentsParametersValidator();
    }
}
