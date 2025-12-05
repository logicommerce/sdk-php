<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the company role permissions values main class.
 * The company role permissions values information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CompanyRolePermissionsValues::getCompanyRead()
 * @see CompanyRolePermissionsValues::getCompanyUpdate()
 * @see CompanyRolePermissionsValues::getCompanyDelete()
 * @see CompanyRolePermissionsValues::getCompanyMasterUpdate()
 * @see CompanyRolePermissionsValues::getCompanyEmployeesCreate()
 * @see CompanyRolePermissionsValues::getCompanyEmployeesDelete()
 * @see CompanyRolePermissionsValues::getCompanyEmployeesRead()
 * @see CompanyRolePermissionsValues::getCompanyEmployeesUpdate()
 * @see CompanyRolePermissionsValues::getCompanyEmployeesRoleUpdate()
 * @see CompanyRolePermissionsValues::getThisAccountUpdate()
 * @see CompanyRolePermissionsValues::getThisAccountDelete()
 * @see CompanyRolePermissionsValues::getThisAccountRead()
 * @see CompanyRolePermissionsValues::getThisAccountMasterUpdate()
 * @see CompanyRolePermissionsValues::getThisAccountEmployeesCreate()
 * @see CompanyRolePermissionsValues::getThisAccountEmployeesDelete()
 * @see CompanyRolePermissionsValues::getThisAccountEmployeesRead()
 * @see CompanyRolePermissionsValues::getThisAccountEmployeesUpdate()
 * @see CompanyRolePermissionsValues::getThisAccountEmployeesRoleUpdate()
 * @see CompanyRolePermissionsValues::getSubCompanyStructureCreate()
 * @see CompanyRolePermissionsValues::getSubCompanyStructureRead()
 * @see CompanyRolePermissionsValues::getSubCompanyStructureUpdate()
 * @see CompanyRolePermissionsValues::getSubCompanyStructureDelete()
 * @see CompanyRolePermissionsValues::getSubCompanyStructureMasterUpdate()
 * @see CompanyRolePermissionsValues::getSubCompanyStructureEmployeesCreate()
 * @see CompanyRolePermissionsValues::getSubCompanyStructureEmployeesDelete()
 * @see CompanyRolePermissionsValues::getSubCompanyStructureEmployeesRead()
 * @see CompanyRolePermissionsValues::getSubCompanyStructureEmployeesUpdate()
 * @see CompanyRolePermissionsValues::getSubCompanyStructureEmployeesRoleUpdate()
 * @see CompanyRolePermissionsValues::getRolesCreate()
 * @see CompanyRolePermissionsValues::getRolesRead()
 * @see CompanyRolePermissionsValues::getRolesUpdate()
 * @see CompanyRolePermissionsValues::getRolesDelete()
 * @see CompanyRolePermissionsValues::getOrdersReadOwn()
 * @see CompanyRolePermissionsValues::getOrdersReadAllEmployees()
 * @see CompanyRolePermissionsValues::getOrdersReadThisAccount()
 * @see CompanyRolePermissionsValues::getOrdersReadSubAccounts()
 * @see CompanyRolePermissionsValues::getOrdersCreateWithoutApproval()
 * @see CompanyRolePermissionsValues::getOrdersApprovalDecisionThisAccount()
 * @see CompanyRolePermissionsValues::getOrdersApprovalDecisionSubAccounts()
 * @see CompanyRolePermissionsValues::getOrdersLimitAmountPerOrder()
 * @see CompanyRolePermissionsValues::getOrdersLimitOrderQuantityPerEmployee()
 *
 * @see Element
 * @see ElementTrait
 * @see RangeByCurrency
 * @see IntegerLimitInLastDays
 *
 * @package SDK\Dtos\Accounts
 */
class CompanyRolePermissionsValues extends Element {

    use ElementTrait {
        __construct as superConstruct;
    }

    protected bool $companyRead = false;
    protected bool $companyUpdate = false;
    protected bool $companyDelete = false;
    protected bool $companyMasterUpdate = false;

    protected bool $companyEmployeesCreate = false;
    protected bool $companyEmployeesDelete = false;
    protected bool $companyEmployeesRead = false;
    protected bool $companyEmployeesUpdate = false;
    protected bool $companyEmployeesRoleUpdate = false;

    protected bool $thisAccountUpdate = false;
    protected bool $thisAccountDelete = false;
    protected bool $thisAccountRead = false;
    protected bool $thisAccountMasterUpdate = false;

    protected bool $thisAccountEmployeesCreate = false;
    protected bool $thisAccountEmployeesDelete = false;
    protected bool $thisAccountEmployeesRead = false;
    protected bool $thisAccountEmployeesUpdate = false;
    protected bool $thisAccountEmployeesRoleUpdate = false;

    protected bool $subCompanyStructureCreate = false;
    protected bool $subCompanyStructureRead = false;
    protected bool $subCompanyStructureUpdate = false;
    protected bool $subCompanyStructureDelete = false;
    protected bool $subCompanyStructureMasterUpdate = false;

    protected bool $subCompanyStructureEmployeesCreate = false;
    protected bool $subCompanyStructureEmployeesDelete = false;
    protected bool $subCompanyStructureEmployeesRead = false;
    protected bool $subCompanyStructureEmployeesUpdate = false;
    protected bool $subCompanyStructureEmployeesRoleUpdate = false;

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

    protected array $ordersLimitAmountPerOrder = [];
    protected ?IntegerLimitInLastDays $ordersLimitOrderQuantityPerEmployee = null;

    /**
     * Returns the company read.
     * 
     * @return bool
     */
    public function getCompanyRead(): bool {
        return $this->companyRead;
    }

    /**
     * Returns the company update.
     * 
     * @return bool
     */
    public function getCompanyUpdate(): bool {
        return $this->companyUpdate;
    }

    /**
     * Returns the company delete.
     * 
     * @return bool
     */
    public function getCompanyDelete(): bool {
        return $this->companyDelete;
    }

    /**
     * Returns the company master update.
     * 
     * @return bool
     */
    public function getCompanyMasterUpdate(): bool {
        return $this->companyMasterUpdate;
    }

    /**
     * Returns the company employees create.
     * 
     * @return bool
     */
    public function getCompanyEmployeesCreate(): bool {
        return $this->companyEmployeesCreate;
    }

    /**
     * Returns the company employees delete.
     * 
     * @return bool
     */
    public function getCompanyEmployeesDelete(): bool {
        return $this->companyEmployeesDelete;
    }

    /**
     * Returns the company employees read.
     * 
     * @return bool
     */
    public function getCompanyEmployeesRead(): bool {
        return $this->companyEmployeesRead;
    }

    /**
     * Returns the company employees update.
     * 
     * @return bool
     */
    public function getCompanyEmployeesUpdate(): bool {
        return $this->companyEmployeesUpdate;
    }

    /**
     * Returns the company employees role update.
     * 
     * @return bool
     */
    public function getCompanyEmployeesRoleUpdate(): bool {
        return $this->companyEmployeesRoleUpdate;
    }

    /**
     * Returns the this account update.
     * 
     * @return bool
     */
    public function getThisAccountUpdate(): bool {
        return $this->thisAccountUpdate;
    }

    /**
     * Returns the this account delete.
     * 
     * @return bool
     */
    public function getThisAccountDelete(): bool {
        return $this->thisAccountDelete;
    }

    /**
     * Returns the this account read.
     * 
     * @return bool
     */
    public function getThisAccountRead(): bool {
        return $this->thisAccountRead;
    }

    /**
     * Returns the this account master update.
     * 
     * @return bool
     */
    public function getThisAccountMasterUpdate(): bool {
        return $this->thisAccountMasterUpdate;
    }

    /**
     * Returns the this account employees create.
     * 
     * @return bool
     */
    public function getThisAccountEmployeesCreate(): bool {
        return $this->thisAccountEmployeesCreate;
    }

    /**
     * Returns the this account employees delete.
     * 
     * @return bool
     */
    public function getThisAccountEmployeesDelete(): bool {
        return $this->thisAccountEmployeesDelete;
    }

    /**
     * Returns the this account employees read.
     * 
     * @return bool
     */
    public function getThisAccountEmployeesRead(): bool {
        return $this->thisAccountEmployeesRead;
    }

    /**
     * Returns the this account employees update.
     * 
     * @return bool
     */
    public function getThisAccountEmployeesUpdate(): bool {
        return $this->thisAccountEmployeesUpdate;
    }

    /**
     * Returns the this account employees role update.
     * 
     * @return bool
     */
    public function getThisAccountEmployeesRoleUpdate(): bool {
        return $this->thisAccountEmployeesRoleUpdate;
    }

    /**
     * Returns the sub company structure create.
     * 
     * @return bool
     */
    public function getSubCompanyStructureCreate(): bool {
        return $this->subCompanyStructureCreate;
    }

    /**
     * Returns the sub company structure read.
     * 
     * @return bool
     */
    public function getSubCompanyStructureRead(): bool {
        return $this->subCompanyStructureRead;
    }

    /**
     * Returns the sub company structure update.
     * 
     * @return bool
     */
    public function getSubCompanyStructureUpdate(): bool {
        return $this->subCompanyStructureUpdate;
    }

    /**
     * Returns the sub company structure delete.
     * 
     * @return bool
     */
    public function getSubCompanyStructureDelete(): bool {
        return $this->subCompanyStructureDelete;
    }

    /**
     * Returns the sub company structure master update.
     * 
     * @return bool
     */
    public function getSubCompanyStructureMasterUpdate(): bool {
        return $this->subCompanyStructureMasterUpdate;
    }

    /**
     * Returns the sub company structure employees create.
     * 
     * @return bool
     */
    public function getSubCompanyStructureEmployeesCreate(): bool {
        return $this->subCompanyStructureEmployeesCreate;
    }

    /**
     * Returns the sub company structure employees delete.
     * 
     * @return bool
     */
    public function getSubCompanyStructureEmployeesDelete(): bool {
        return $this->subCompanyStructureEmployeesDelete;
    }

    /**
     * Returns the sub company structure employees read.
     * 
     * @return bool
     */
    public function getSubCompanyStructureEmployeesRead(): bool {
        return $this->subCompanyStructureEmployeesRead;
    }

    /**
     * Returns the sub company structure employees update.
     * 
     * @return bool
     */
    public function getSubCompanyStructureEmployeesUpdate(): bool {
        return $this->subCompanyStructureEmployeesUpdate;
    }

    /**
     * Returns the sub company structure employees role update.
     * 
     * @return bool
     */
    public function getSubCompanyStructureEmployeesRoleUpdate(): bool {
        return $this->subCompanyStructureEmployeesRoleUpdate;
    }

    /**
     * Returns the roles create.
     * 
     * @return bool
     */
    public function getRolesCreate(): bool {
        return $this->rolesCreate;
    }

    /**
     * Returns the roles read.
     * 
     * @return bool
     */
    public function getRolesRead(): bool {
        return $this->rolesRead;
    }

    /**
     * Returns the roles update.
     * 
     * @return bool
     */
    public function getRolesUpdate(): bool {
        return $this->rolesUpdate;
    }

    /**
     * Returns the roles delete.
     * 
     * @return bool
     */
    public function getRolesDelete(): bool {
        return $this->rolesDelete;
    }

    /**
     * Returns the orders read own.
     * 
     * @return bool
     */
    public function getOrdersReadOwn(): bool {
        return $this->ordersReadOwn;
    }

    /**
     * Returns the orders read all employees.
     * 
     * @return bool
     */
    public function getOrdersReadAllEmployees(): bool {
        return $this->ordersReadAllEmployees;
    }

    /**
     * Returns the orders read this account.
     * 
     * @return bool
     */
    public function getOrdersReadThisAccount(): bool {
        return $this->ordersReadThisAccount;
    }

    /**
     * Returns the orders read sub accounts.
     * 
     * @return bool
     */
    public function getOrdersReadSubAccounts(): bool {
        return $this->ordersReadSubAccounts;
    }

    /**
     * Returns the orders create without approval.
     * 
     * @return bool
     */
    public function getOrdersCreateWithoutApproval(): bool {
        return $this->ordersCreateWithoutApproval;
    }

    /**
     * Returns the orders approval decision this account.
     * 
     * @return bool
     */
    public function getOrdersApprovalDecisionThisAccount(): bool {
        return $this->ordersApprovalDecisionThisAccount;
    }

    /**
     * Returns the orders approval decision sub accounts.
     * 
     * @return bool
     */
    public function getOrdersApprovalDecisionSubAccounts(): bool {
        return $this->ordersApprovalDecisionSubAccounts;
    }

    /**
     * Returns the orders limit amount per order.
     * 
     * @return RangeByCurrency[]
     */
    public function getOrdersLimitAmountPerOrder(): array {
        return $this->ordersLimitAmountPerOrder;
    }

    protected function setOrdersLimitAmountPerOrder(array $ordersLimitAmountPerOrder): void {
        $this->ordersLimitAmountPerOrder = $this->setArrayField($ordersLimitAmountPerOrder, RangeByCurrency::class);
    }

    /**
     * @return ?IntegerLimitInLastDays
     */
    public function getOrdersLimitOrderQuantityPerEmployee(): ?IntegerLimitInLastDays {
        return $this->ordersLimitOrderQuantityPerEmployee;
    }

    protected function setOrdersLimitOrderQuantityPerEmployee(array $ordersLimitOrderQuantityPerEmployee): void {
        $this->ordersLimitOrderQuantityPerEmployee = new IntegerLimitInLastDays($ordersLimitOrderQuantityPerEmployee);
    }
}
