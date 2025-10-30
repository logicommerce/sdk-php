<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 *
 * Class to validate company role permission values.
 * 
 * @package SDK\Services\Parameters\Validators\Account
 */
class CompanyRolePermissionsValuesParametersValidator extends ParametersValidator {

    protected function validateCompanyRead($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateCompanyUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateCompanyEmployeesRead($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateCompanyEmployeesUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateCompanyEmployeesRoleUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateCompanyEmployeesCreate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateCompanyEmployeesDelete($value): ?bool {
        return $this->validateBoolean($value);
    }

    protected function validateThisAccountUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateThisAccountDelete($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateThisAccountEmployeesRead($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateThisAccountEmployeesUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateThisAccountEmployeesRoleUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateThisAccountEmployeesCreate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateThisAccountEmployeesDelete($value): ?bool {
        return $this->validateBoolean($value);
    }

    protected function validateSubCompanyStructureCreate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateSubCompanyStructureRead($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateSubCompanyStructureUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateSubCompanyStructureMasterUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateSubCompanyStructureDelete($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateSubCompanyStructureEmployeesRead($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateSubCompanyStructureEmployeesUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateSubCompanyStructureEmployeesRoleUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateSubCompanyStructureEmployeesCreate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateSubCompanyStructureEmployeesDelete($value): ?bool {
        return $this->validateBoolean($value);
    }

    protected function validateRolesCreate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateRolesRead($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateRolesUpdate($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateRolesDelete($value): ?bool {
        return $this->validateBoolean($value);
    }

    protected function validateOrdersReadOwn($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateOrdersReadAllEmployees($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateOrdersReadThisAccount($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateOrdersReadSubAccounts($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateOrdersCreateWithoutApproval($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateOrdersApprovalDecisionThisAccount($value): ?bool {
        return $this->validateBoolean($value);
    }
    protected function validateOrdersApprovalDecisionSubAccounts($value): ?bool {
        return $this->validateBoolean($value);
    }
}
