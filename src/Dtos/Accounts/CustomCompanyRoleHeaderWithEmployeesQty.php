<?php

namespace SDK\Dtos\Accounts;

/**
 * Represents a custom company role header with employees quantity.
 * 
 * @see CustomCompanyRoleHeader
 * 
 * @package SDK\Dtos\Accounts
 */
class CustomCompanyRoleHeaderWithEmployeesQty extends CustomCompanyRoleHeader {

    protected int $employeesQuantity = 0;

    /**
     * Sets the employees quantity.
     *
     * @return int
     */
    public function getEmployeesQuantity(): int {
        return $this->employeesQuantity;
    }
}
