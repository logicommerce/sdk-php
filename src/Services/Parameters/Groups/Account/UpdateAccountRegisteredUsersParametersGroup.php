<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Account\UpdateAccountRegisteredUsersParametersValidator;

/**
 * This is the account model (registered users resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class UpdateAccountRegisteredUsersParametersGroup extends ParametersGroup {

    protected int $accountId;

    protected bool $master;

    protected string $status;

    protected int $roleId;

    protected string $accountAlias;

    protected string $job;

    protected bool $useShippingAddress;

    /**
     * Sets the account identifier parameter for this parameters group.
     *
     * @param int $accountId
     *
     * @return void
     */
    public function setAccountId(int $accountId): void {
        $this->accountId = $accountId;
    }

    /**
     * Sets a master parameter for this parameters group.
     *
     * @param bool $master
     *
     * @return void
     */
    public function setMaster(bool $master): void {
        $this->master = $master;
    }

    /**
     * Sets the status parameter for this parameters group.
     *
     * @param string $status
     *
     * @return void
     */
    public function setStatus(string $status): void {
        $this->status = $status;
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
     * Sets the account alias parameter for this parameters group.
     *
     * @param string $accountAlias
     *
     * @return void
     */
    public function setAccountAlias(string $accountAlias): void {
        $this->accountAlias = $accountAlias;
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
     * Sets the use shipping address parameter for this parameters group.
     *
     * @param bool $useShippingAddress
     *
     * @return void
     */
    public function setUseShippingAddress(bool $useShippingAddress): void {
        $this->useShippingAddress = $useShippingAddress;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): UpdateAccountRegisteredUsersParametersValidator {
        return new UpdateAccountRegisteredUsersParametersValidator();
    }
}
