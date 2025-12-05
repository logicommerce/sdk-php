<?php

namespace SDK\Dtos\Accounts;

/**
 * This is the custom company role header with employees quantity main class.
 * The custom company role header with employees quantity information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CustomCompanyRoleHeaderWithEmployeesQty::getEmployeesQuantity()
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
