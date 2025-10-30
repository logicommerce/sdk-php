<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Services\Parameters\Validators\AreaCategoriesTreeParametersValidator;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;

/**
 * This is the area model (categories resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class AreaCategoriesTreeParametersGroup extends AreaCategoryParametersGroup {

    protected int $levels;

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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AreaCategoriesTreeParametersValidator {
        return new AreaCategoriesTreeParametersValidator();
    }
}
