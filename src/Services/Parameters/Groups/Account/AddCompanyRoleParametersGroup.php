<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Account\AddCompanyRolesParametersValidator;

/**
 * Class to add a company role.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class AddCompanyRoleParametersGroup extends ParametersGroup {

    protected string $name;

    protected string $description;

    protected string $pId;

    protected string $target;

    protected bool $targetDefault;

    protected CompanyRolePermissionsValuesParametersGroup $permissions;

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
     * Sets the description parameter for this parameters group.
     * 
     * @param string $description
     *
     * @return void
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * Sets the pId parameter for this parameters group.
     * 
     * @param string $pId
     *
     * @return void
     */
    public function setPId(string $pId): void {
        $this->pId = $pId;
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
     * @param string $target
     *
     * @return void
     */
    public function setTargetDefault(bool $targetDefault): void {
        $this->targetDefault = $targetDefault;
    }

    /**
     * Sets the permissions parameter for this parameters group.
     * 
     * @param CompanyRolePermissionsValuesParametersGroup $permissions
     *
     * @return void
     */
    public function setPermissions(CompanyRolePermissionsValuesParametersGroup $permissions): void {
        $this->permissions = $permissions;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddCompanyRolesParametersValidator {
        return new AddCompanyRolesParametersValidator();
    }
}
