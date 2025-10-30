<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Groups\Traits;

/**
 * This is the sortable items parameters group trait.
 *
 * @package SDK\Core\Services\Parameters\Groups\Traits
 */
trait SortableItemsParametersGroupTrait {

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
}
