<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\CategoriesTreeParametersValidator;

/**
 * This is the area model (categories resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class CategoriesTreeParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait, IdentifiableItemsParametersGroupTrait;

    protected string $idList;

    protected string $pId;

    protected string $q;

    protected int $levels;

    protected bool $onlyActive;

    protected string $sort;

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
     * Sets the public identifier parameter for this parameters group.
     *
     * @param string $pId
     *
     * @return void
     */
    public function setPId(string $pId): void {
        $this->pId = $pId;
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
     * Sets the levels parameter for this parameters group.
     *
     * @param int $levels
     *
     * @return void
     */
    public function setLevels(int $levels): void {
        $this->levels = $levels;
    }

    /**
     * Sets if the elements will be filtered using this parameters group in function of if they are active or not.
     *
     * @param bool $onlyActive
     *
     * @return void
     */
    public function setOnlyActive(bool $onlyActive): void {
        $this->onlyActive = $onlyActive;
    }

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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CategoriesTreeParametersValidator {
        return new CategoriesTreeParametersValidator();
    }
}
