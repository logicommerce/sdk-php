<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Account\ApproveAccountRegisteredUserParametersValidator;

/**
 * This is the account model (registered users resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class ApproveAccountRegisteredUserParametersGroup extends ParametersGroup {

    protected string $hash;

    protected RegisteredUserApproveUpdateParametersGroup $registeredUser;

    /**
     * Sets the hash parameter for this parameters group.
     *
     * @param string $hash
     *
     * @return void
     */
    public function setHash(string $hash): void {
        $this->hash = $hash;
    }

    /**
     * Sets the registered user approve update parameters for this parameters group.
     *
     * @param RegisteredUserApproveUpdateParametersGroup $registeredUserApproveUpdate
     *
     * @return void
     */
    public function setRegisteredUser(RegisteredUserApproveUpdateParametersGroup $registeredUser): void {
        $this->registeredUser = $registeredUser;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ApproveAccountRegisteredUserParametersValidator {
        return new ApproveAccountRegisteredUserParametersValidator();
    }
}
