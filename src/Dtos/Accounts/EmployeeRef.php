<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Factories\CompanyRoleHeaderFactory;

/**
 * This is the employee reference main class.
 * The employee reference information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see EmployeeRef::getJob()
 * @see EmployeeRef::getRole()
 *
 * @see MasterRef
 * @see CompanyRoleHeader
 * @see CompanyRoleHeaderFactory
 *
 * @package SDK\Dtos\Accounts
 */
class EmployeeRef extends MasterRef {

    protected string $job = "";

    protected ?CompanyRoleHeader $role = null;

    /**
     * returns the job
     *
     * @return string
     */
    public function getJob(): string {
        return $this->job;
    }

    protected function setJob(string $job): void {
        $this->job = $job;
    }

    /**
     * Returns the company role.
     *
     * @return CompanyRoleHeader
     */
    public function getRole(): ?CompanyRoleHeader {
        return $this->role;
    }

    protected function setRole(array $role): void {
        $this->role = CompanyRoleHeaderFactory::getElement($role);
    }
}
