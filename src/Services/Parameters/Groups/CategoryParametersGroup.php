<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\CatalogItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\FilterIndexableParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\CategoryParametersValidator;

/**
 * This is the category model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class CategoryParametersGroup extends ParametersGroup {
    use CatalogItemsParametersGroupTrait, PaginableItemsParametersGroupTrait, FilterIndexableParametersGroupTrait;

    protected int $parentId;

    protected string $parentPId;

    protected string $parentIdList;

    protected int $areaId;

    protected string $areaPId;

    protected string $areaIdList;

    protected int $areaPosition;

    protected string $q;

    protected bool $onlyActive;

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
     * Sets the area internal identifier parameter for this parameters group.
     *
     * @param int $areaId
     *
     * @return void
     */
    public function setAreaId(int $areaId): void {
        $this->areaId = $areaId;
    }

    /**
     * Sets the area public identifier parameter for this parameters group.
     *
     * @param string $areaPId
     *
     * @return void
     */
    public function setAreaPId(string $areaPId): void {
        $this->areaPId = $areaPId;
    }

    /**
     * Sets a list of area internal identifiers for this parameters group.
     *
     * @param string $areaIdList
     *
     * @return void
     */
    public function setAreaIdList(string $areaIdList): void {
        $this->areaIdList = $areaIdList;
    }

    /**
     * Sets the area position parameter for this parameters group.
     *
     * @param int $areaPosition
     *
     * @return void
     */
    public function setAreaPosition(int $areaPosition): void {
        $this->areaPosition = $areaPosition;
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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CategoryParametersValidator {
        return new CategoryParametersValidator();
    }
}
