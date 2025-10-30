<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\AreaCategoryParametersValidator;

/**
 * This is the area model (categories resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class AreaCategoryParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected bool $onlyActive;

    protected string $sort;

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
    protected function getValidator(): AreaCategoryParametersValidator {
        return new AreaCategoryParametersValidator();
    }
}
