<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Services\Parameters\Validators\Account\MasterParametersValidator;
use SDK\Services\Parameters\Validators\Account\MasterUpdateParametersValidator;

/**
 * This is the master updateparameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class MasterUpdateParametersGroup extends MasterParametersGroup {

    protected int $roleId;

    /**
     * Sets a roleId parameter for this parameters group.
     *
     * @param int $role
     *
     * @return void
     */
    public function setRoleId(int $roleId): void {
        $this->roleId = $roleId;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): MasterUpdateParametersValidator {
        return new MasterUpdateParametersValidator();
    }
}
