<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\FilterIndexableParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\SortableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\BrandParametersValidator;

/**
 * This is the brand model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class BrandParametersGroup extends ParametersGroup {
    use IdentifiableItemsParametersGroupTrait, PaginableItemsParametersGroupTrait, SortableItemsParametersGroupTrait, FilterIndexableParametersGroupTrait;

    protected string $pId;

    protected string $idList;

    protected string $q;

    protected bool $onlyActive;

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
     * Sets a list of internal identifiers for this parameters group.
     *
     * @param string $idList
     *
     * @return void
     */
    public function setIdList(string $idList): void {
        $this->idList = $idList;
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
    protected function getValidator(): BrandParametersValidator {
        return new BrandParametersValidator();
    }
}
