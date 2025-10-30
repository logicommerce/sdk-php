<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Blog;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\SortableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Blog\BloggerParametersValidator;

/**
 * This is the blog model (blogger resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Blog
 */
class BloggerParametersGroup extends ParametersGroup {
    use IdentifiableItemsParametersGroupTrait, SortableItemsParametersGroupTrait, PaginableItemsParametersGroupTrait;

    protected string $idList;

    /**
     * Sets a parameter with a list of internal identifiers for this parameters group.
     *
     * @param string $idList
     *
     * @return void
     */
    public function setIdList(string $idList): void {
        $this->idList = $idList;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): BloggerParametersValidator {
        return new BloggerParametersValidator();
    }
}
