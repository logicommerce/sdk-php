<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\ShoppingListRowsParametersValidator;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;

/**
 * This is the shopping lists rows parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class ShoppingListRowsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $sort;

    protected string $q;

    /**
     * Sort variable. Comma-sepparated list of these possible values: priority.asc,priority.desc,importance.asc,importance.desc,addedDate.asc,addedDate.desc.
     *
     * @param string $sort
     *
     * @return void
     */
    public function setSort(string $sort): void {
        $this->sort = $sort;
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
    protected function getValidator(): ShoppingListRowsParametersValidator {
        return new ShoppingListRowsParametersValidator();
    }
}
