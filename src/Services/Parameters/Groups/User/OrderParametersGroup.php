<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\User\OrderParametersValidator;

/**
 * This is the user model (orders resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class OrderParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $sort;

    protected string $sortByIdList;

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
     * Sets a list of internal identifiers as a sort criteria parameter for this parameters group.
     *
     * @param string $sortByIdList
     *
     * @return void
     */
    public function setSortByIdList(string $sortByIdList): void {
        $this->sortByIdList = $sortByIdList;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): OrderParametersValidator {
        return new OrderParametersValidator();
    }
}
