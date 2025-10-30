<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\ShoppingListsParametersValidator;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;

/**
 * This is the shopping lists parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class ShoppingListsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $idList;

    protected string $sort;

    protected bool $defaultOne;

    protected string $q;
    /**
     * Sets the idList parameter for this parameters group.
     *
     * @param string $idList
     *
     * @return void
     */
    public function setIdList(string $idList): void {
        $this->idList = $idList;
    }

    /**
     * Sort variable. Comma-sepparated list of these possible values: addedDate.asc,addedDate.desc,name.asc,name.desc,priority.asc,priority.desc
     *
     * @param string $sort
     *
     * @return void
     */
    public function setSort(string $sort): void {
        $this->sort = $sort;
    }

    /**
     * arameter to specify if you only want to only obtain the default shoppingList, or the non-default shoppingLists.
     *
     * @param bool $defaultOne
     *
     * @return void
     */
    public function setDefaultOne(bool $defaultOne): void {
        $this->defaultOne = $defaultOne;
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
    protected function getValidator(): ShoppingListsParametersValidator {
        return new ShoppingListsParametersValidator();
    }
}
