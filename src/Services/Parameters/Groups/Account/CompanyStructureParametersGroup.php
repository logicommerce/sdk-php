<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Account\CompanyStructureParametersValidator;

/**
 * This is the company structure parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class CompanyStructureParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected int $levels;

    protected string $structureFilter;

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
     * Specifies the structureFilter of this company structure row over the rest. Enum StructureFilter: "NONE","PATH_TO_ROOT","SUB_STRUCTURE","SUB_STRUCTURE_WITH_PATH_TO_ROOT"
     *
     * @param string $structureFilter
     *
     * @return void
     */
    public function setStructureFilter(string $structureFilter): void {
        $this->structureFilter = $structureFilter;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CompanyStructureParametersValidator {
        return new CompanyStructureParametersValidator();
    }
}
