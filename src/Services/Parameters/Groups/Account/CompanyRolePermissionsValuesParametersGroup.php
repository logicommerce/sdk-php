<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Account\CompanyRolePermissionsValuesParametersValidator;
use SDK\Services\Parameters\Validators\Account\CompanyRolesParametersValidator;

/**
 * This is the company roles permissions parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class CompanyRolePermissionsValuesParametersGroup extends ParametersGroup {

    protected bool $companyRead = false;
    protected bool $companyUpdate = false;
    protected bool $companyEmployeesRead = false;
    protected bool $companyEmployeesUpdate = false;
    protected bool $companyEmployeesRoleUpdate = false;
    protected bool $companyEmployeesCreate = false;
    protected bool $companyEmployeesDelete = false;

    protected bool $thisAccountUpdate = false;
    protected bool $thisAccountDelete = false;
    protected bool $thisAccountEmployeesRead = false;
    protected bool $thisAccountEmployeesUpdate = false;
    protected bool $thisAccountEmployeesRoleUpdate = false;
    protected bool $thisAccountEmployeesCreate = false;
    protected bool $thisAccountEmployeesDelete = false;

    protected bool $subCompanyStructureCreate = false;
    protected bool $subCompanyStructureRead = false;
    protected bool $subCompanyStructureUpdate = false;
    protected bool $subCompanyStructureMasterUpdate = false;
    protected bool $subCompanyStructureDelete = false;
    protected bool $subCompanyStructureEmployeesRead = false;
    protected bool $subCompanyStructureEmployeesUpdate = false;
    protected bool $subCompanyStructureEmployeesRoleUpdate = false;
    protected bool $subCompanyStructureEmployeesCreate = false;
    protected bool $subCompanyStructureEmployeesDelete = false;

    protected bool $rolesCreate = false;
    protected bool $rolesRead = false;
    protected bool $rolesUpdate = false;
    protected bool $rolesDelete = false;

    protected bool $ordersReadOwn = false;
    protected bool $ordersReadAllEmployees = false;
    protected bool $ordersReadThisAccount = false;
    protected bool $ordersReadSubAccounts = false;
    protected bool $ordersCreateWithoutApproval = false;
    protected bool $ordersApprovalDecisionThisAccount = false;
    protected bool $ordersApprovalDecisionSubAccounts = false;


    public function setCompanyRead(bool $value): void {
        $this->companyRead = $value;
    }
    public function setCompanyUpdate(bool $value): void {
        $this->companyUpdate = $value;
    }
    public function setCompanyEmployeesRead(bool $value): void {
        $this->companyEmployeesRead = $value;
    }
    public function setCompanyEmployeesUpdate(bool $value): void {
        $this->companyEmployeesUpdate = $value;
    }
    public function setCompanyEmployeesRoleUpdate(bool $value): void {
        $this->companyEmployeesRoleUpdate = $value;
    }
    public function setCompanyEmployeesCreate(bool $value): void {
        $this->companyEmployeesCreate = $value;
    }
    public function setCompanyEmployeesDelete(bool $value): void {
        $this->companyEmployeesDelete = $value;
    }

    public function setThisAccountUpdate(bool $value): void {
        $this->thisAccountUpdate = $value;
    }
    public function setThisAccountDelete(bool $value): void {
        $this->thisAccountDelete = $value;
    }
    public function setThisAccountEmployeesRead(bool $value): void {
        $this->thisAccountEmployeesRead = $value;
    }
    public function setThisAccountEmployeesUpdate(bool $value): void {
        $this->thisAccountEmployeesUpdate = $value;
    }
    public function setThisAccountEmployeesRoleUpdate(bool $value): void {
        $this->thisAccountEmployeesRoleUpdate = $value;
    }
    public function setThisAccountEmployeesCreate(bool $value): void {
        $this->thisAccountEmployeesCreate = $value;
    }
    public function setThisAccountEmployeesDelete(bool $value): void {
        $this->thisAccountEmployeesDelete = $value;
    }

    public function setSubCompanyStructureCreate(bool $value): void {
        $this->subCompanyStructureCreate = $value;
    }
    public function setSubCompanyStructureRead(bool $value): void {
        $this->subCompanyStructureRead = $value;
    }
    public function setSubCompanyStructureUpdate(bool $value): void {
        $this->subCompanyStructureUpdate = $value;
    }
    public function setSubCompanyStructureMasterUpdate(bool $value): void {
        $this->subCompanyStructureMasterUpdate = $value;
    }
    public function setSubCompanyStructureDelete(bool $value): void {
        $this->subCompanyStructureDelete = $value;
    }
    public function setSubCompanyStructureEmployeesRead(bool $value): void {
        $this->subCompanyStructureEmployeesRead = $value;
    }
    public function setSubCompanyStructureEmployeesUpdate(bool $value): void {
        $this->subCompanyStructureEmployeesUpdate = $value;
    }
    public function setSubCompanyStructureEmployeesRoleUpdate(bool $value): void {
        $this->subCompanyStructureEmployeesRoleUpdate = $value;
    }
    public function setSubCompanyStructureEmployeesCreate(bool $value): void {
        $this->subCompanyStructureEmployeesCreate = $value;
    }
    public function setSubCompanyStructureEmployeesDelete(bool $value): void {
        $this->subCompanyStructureEmployeesDelete = $value;
    }

    public function setRolesCreate(bool $value): void {
        $this->rolesCreate = $value;
    }
    public function setRolesRead(bool $value): void {
        $this->rolesRead = $value;
    }
    public function setRolesUpdate(bool $value): void {
        $this->rolesUpdate = $value;
    }
    public function setRolesDelete(bool $value): void {
        $this->rolesDelete = $value;
    }

    public function setOrdersReadOwn(bool $value): void {
        $this->ordersReadOwn = $value;
    }
    public function setOrdersReadAllEmployees(bool $value): void {
        $this->ordersReadAllEmployees = $value;
    }
    public function setOrdersReadThisAccount(bool $value): void {
        $this->ordersReadThisAccount = $value;
    }
    public function setOrdersReadSubAccounts(bool $value): void {
        $this->ordersReadSubAccounts = $value;
    }
    public function setOrdersCreateWithoutApproval(bool $value): void {
        $this->ordersCreateWithoutApproval = $value;
    }
    public function setOrdersApprovalDecisionThisAccount(bool $value): void {
        $this->ordersApprovalDecisionThisAccount = $value;
    }
    public function setOrdersApprovalDecisionSubAccounts(bool $value): void {
        $this->ordersApprovalDecisionSubAccounts = $value;
    }

    /**
     * Método para retornar el validador.
     */
    protected function getValidator(): CompanyRolePermissionsValuesParametersValidator {
        return new CompanyRolePermissionsValuesParametersValidator();
    }
}
