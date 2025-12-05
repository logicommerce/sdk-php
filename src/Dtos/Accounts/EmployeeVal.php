<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Factories\CompanyRoleHeaderFactory;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the employee value main class.
 * The employee value information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see EmployeeVal::getJob()
 * @see EmployeeVal::getRole()
 *
 * @see MasterVal
 * @see IdentifiableElementTrait
 * @see CompanyRoleHeader
 * @see CompanyRoleHeaderFactory
 *
 * @package SDK\Dtos\Accounts
 */
class EmployeeVal extends MasterVal {
    use IdentifiableElementTrait;

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
