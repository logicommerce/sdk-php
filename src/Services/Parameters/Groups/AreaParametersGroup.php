<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\CatalogItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\FilterIndexableParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\AreaParametersValidator;

/**
 * This is the area model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class AreaParametersGroup extends ParametersGroup {
    use CatalogItemsParametersGroupTrait, PaginableItemsParametersGroupTrait, FilterIndexableParametersGroupTrait;

    protected int $position;

    protected string $positionList;

    protected int $randomItems;

    protected bool $onlyActive;

    /**
     * Sets the position parameter for this parameters group.
     *
     * @param int $position
     *
     * @return void
     */
    public function setPosition(int $position): void {
        $this->position = $position;
    }

    /**
     * Sets the positionList parameter for this parameters group.
     *
     * @param string $positionList
     *
     * @return void
     */
    public function setPositionList(string $positionList): void {
        $this->positionList = $positionList;
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
    protected function getValidator(): AreaParametersValidator {
        return new AreaParametersValidator();
    }
}
