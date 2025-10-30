<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Account\CreateAccountRegisteredUserParametersValidator;

/**
 * This is the account model (registered users resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class CreateAccountRegisteredUserParametersGroup extends ParametersGroup {

    protected int $registeredUserId;

    protected RegisteredUserParametersGroup $registeredUser;

    protected string $job;

    protected int $roleId;

    /**
     * Sets the registered user identifier parameter for this parameters group.
     *
     * @param int $registeredUserId
     *
     * @return void
     */
    public function setRegisteredUserId(int $registeredUserId): void {
        $this->registeredUserId = $registeredUserId;
    }

    /**
     * Sets the registered User parameter for this parameters group.
     *
     * @param RegisteredUserParametersGroup $registeredUser
     *
     * @return void
     */
    public function setRegisteredUser(RegisteredUserParametersGroup $registeredUser): void {
        $this->registeredUser = $registeredUser;
    }

    /**
     * Sets the job parameter for this parameters group.
     *
     * @param string $job
     *
     * @return void
     */
    public function setJob(string $job): void {
        $this->job = $job;
    }

    /**
     * Sets the role identifier parameter for this parameters group.
     *
     * @param int $roleId
     *
     * @return void
     */
    public function setRoleId(int $roleId): void {
        $this->roleId = $roleId;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CreateAccountRegisteredUserParametersValidator {
        return new CreateAccountRegisteredUserParametersValidator();
    }
}
