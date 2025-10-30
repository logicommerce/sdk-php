<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Factories\CompanyRoleHeaderFactory;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Enums\MasterType;

/**
 * Represents an account employee.
 * 
 * @see CompanyRole
 * @see IdentifiableElementTrait
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
