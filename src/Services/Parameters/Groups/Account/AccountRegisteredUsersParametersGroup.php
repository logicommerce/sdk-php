<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Resources\Date;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\SortableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Account\AccountRegisteredUsersParametersValidator;

/**
 * This is the account model (registered users resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class AccountRegisteredUsersParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait, SortableItemsParametersGroupTrait;

    protected string $email;

    protected string $username;

    protected string $pId;

    protected string $firstName;

    protected string $lastName;

    protected string $statusList;

    protected int $roleId;

    protected bool $master;

    protected string $addedFrom;

    protected string $addedTo;

    /**
     * Sets the email parameter for this parameters group.
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * Sets the username parameter.
     *
     * @param string|null $username
     */
    public function setUsername(string $username): void {
        $this->username = $username;
    }

    /**
     * Sets the public identifier parameter for this parameters group.
     *
     * @param string $pId
     *
     * @return void
     */
    public function setPId(string $pId): void {
        $this->pId = $pId;
    }

    /**
     * Sets the first name parameter for this parameters group.
     *
     * @param string $firstName
     *
     * @return void
     */
    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    /**
     * Sets the last name parameter for this parameters group.
     *
     * @param string $lastName
     *
     * @return void
     */
    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    /**
     * 
     * Sets a statusList parameter for this parameters group.
     *
     * @param string $statusList
     *
     * @return void
     */
    public function setStatusList(string $statusList): void {
        $this->statusList = $statusList;
    }

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
     * Sets a start date for this parameters group.
     *
     * @param \DateTime $addedFrom
     *
     * @return void
     */
    public function setAddedFrom(?\DateTime $addedFrom): void {
        if ($addedFrom !== null) {
            $this->addedFrom = $addedFrom->format(Date::DATETIME_FORMAT);
        } else {
            $this->addedFrom = '';
        }
    }

    /**
     * Sets a end date for this parameters group.
     * 
     * @param \DateTime $addedTo
     *
     * @return void
     */
    public function setAddedTo(?\DateTime $addedTo): void {
        if ($addedTo !== null) {
            $this->addedTo = $addedTo->format(Date::DATETIME_FORMAT);
        } else {
            $this->addedTo = '';
        }
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AccountRegisteredUsersParametersValidator {
        return new AccountRegisteredUsersParametersValidator();
    }
}
