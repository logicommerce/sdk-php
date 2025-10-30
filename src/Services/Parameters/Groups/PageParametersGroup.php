<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\CatalogItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\FilterIndexableParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\PageParametersValidator;

/**
 * This is the page model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class PageParametersGroup extends ParametersGroup {
    use CatalogItemsParametersGroupTrait, PaginableItemsParametersGroupTrait, FilterIndexableParametersGroupTrait;

    protected int $parentId;

    protected string $parentPId;

    protected string $parentIdList;

    protected int $pagesGroupId;

    protected string $pagesGroupPId;

    protected string $pagesGroupIdList;

    protected int $position;

    protected string $positionList;

    protected string $q;

    protected string $pageType;

    protected bool $onlyActive;

    protected int $levels;

    protected int $randomItems;

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
     * Sets the parent public identifier parameter for this parameters group.
     *
     * @param string $parentPId
     *
     * @return void
     */
    public function setParentPId(string $parentPId): void {
        $this->parentPId = $parentPId;
    }

    /**
     * Sets a list of parent internal identifiers for this parameters group.
     *
     * @param string $parentIdList
     *
     * @return void
     */
    public function setParentIdList(string $parentIdList): void {
        $this->parentIdList = $parentIdList;
    }

    /**
     * Sets the pages group internal identifier parameter for this parameters group.
     *
     * @param int $pagesGroupId
     *
     * @return void
     */
    public function setPagesGroupId(int $pagesGroupId): void {
        $this->pagesGroupId = $pagesGroupId;
    }

    /**
     * Sets the pages group public identifier parameter for this parameters group.
     *
     * @param string $pagesGroupPId
     *
     * @return void
     */
    public function setPagesGroupPId(string $pagesGroupPId): void {
        $this->pagesGroupPId = $pagesGroupPId;
    }

    /**
     * Sets a list of pages groups internal identifiers for this parameters group.
     *
     * @param string $pagesGroupIdList
     *
     * @return void
     */
    public function setPagesGroupIdList(string $pagesGroupIdList): void {
        $this->pagesGroupIdList = $pagesGroupIdList;
    }

    /**
     * Sets a position parameter for this parameters group.
     *
     * @param int $position
     *
     * @return void
     */
    public function setPosition(int $position): void {
        $this->position = $position;
    }

    /**
     * Sets a list of positions parameter for this parameters group.
     *
     * @param string $positionList
     *
     * @return void
     */
    public function setPositionList(string $positionList): void {
        $this->positionList = $positionList;
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
     * Sets a page type parameter for this parameters group.
     *
     * @param string $pageType
     *
     * @return void
     */
    public function setPageType(string $pageType): void {
        $this->pageType = $pageType;
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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): PageParametersValidator {
        return new PageParametersValidator();
    }
}
