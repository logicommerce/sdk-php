<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Resources\Date;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Groups\User\UserCustomTagParametersGroup;
use SDK\Services\Parameters\Validators\Account\RegisteredUserApproveUpdateParametersValidator;

/**
 * This is the account model (registered users resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class RegisteredUserApproveUpdateParametersGroup extends ParametersGroup {

    protected string $email;

    protected string $username;

    protected string $pId;

    protected string $password;

    protected string $firstName;

    protected string $lastName;

    protected string $birthday;

    protected string $image;

    protected string $gender;

    protected array $customTags;

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
     * Sets the password parameter for this parameters group.
     *
     * @param string $password
     *
     * @return void
     */
    public function setPassword(string $password): void {
        $this->password = $password;
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
     * Sets the birthday parameter for this parameters group.
     *
     * @param \DateTime $birthday
     *
     * @return void
     */
    public function setBirthday(\DateTime $birthday): void {
        $this->birthday = $birthday->format(Date::DATE_FORMAT);
    }

    /**
     * Sets the image parameter for this parameters group.
     *
     * @param string $image
     *
     * @return void
     */
    public function setImage(string $image): void {
        $this->image = $image;
    }

    /**
     * Sets the gender parameter for this parameters group.
     *
     * @param string $gender
     *
     * @return void
     */
    public function setGender(string $gender): void {
        $this->gender = $gender;
    }

    /**
     * Sets an array of custom tags as a parameter for this parameters group.
     *
     * @param UserCustomTagParametersGroup[] $customTags
     *
     * @return void
     */
    public function setCustomTags(array $customTags): void {
        $this->customTags = [];
        foreach ($customTags as $customTag) {
            $this->addCustomTag($customTag);
        }
    }

    /**
     * Adds a new custom tag to the array of custom tags for this parameters group.
     *
     * @param UserCustomTagParametersGroup $customTag
     *
     * @return void
     */
    public function addCustomTag(UserCustomTagParametersGroup $customTag): void {
        $this->customTags ??= [];
        $this->customTags[] = $customTag;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): RegisteredUserApproveUpdateParametersValidator {
        return new RegisteredUserApproveUpdateParametersValidator();
    }
}
