<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Product\CommentsParametersValidator;

/**
 * This is the product model (get comments resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class CommentsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $sort;

    protected bool $showAllLanguages;

    /**
     * Sets the sort criteria parameter for this parameters group.
     *
     * @param string $sort
     *
     * @return void
     */
    public function setSort(string $sort): void {
        $this->sort = $sort;
    }

    /**
     * Sets if the return will be given in all languages.
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
    protected function getValidator(): CommentsParametersValidator {
        return new CommentsParametersValidator();
    }
}
