<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\SortableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Account\CompanyRolesParametersValidator;
use SDK\Services\Parameters\Validators\Account\CompanyStructureParametersValidator;

/**
 * This is the company roles parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class CompanyRolesParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait, SortableItemsParametersGroupTrait;

    protected string $name;

    protected string $target;

    protected bool $targetDefault;

    /**
     * Sets the name parameter for this parameters group.
     * 
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * Sets the target parameter for this parameters group.
     * 
     * @param string $target
     *
     * @return void
     */
    public function setTarget(string $target): void {
        $this->target = $target;
    }

    /**
     * Sets the target default parameter for this parameters group.
     * 
     * @param bool $targetDefault
     *
     * @return void
     */
    public function setTargetDefault(bool $targetDefault): void {
        $this->targetDefault = $targetDefault;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CompanyRolesParametersValidator {
        return new CompanyRolesParametersValidator();
    }
}
