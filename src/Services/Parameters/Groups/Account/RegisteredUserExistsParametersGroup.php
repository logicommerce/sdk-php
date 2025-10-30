<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Account\RegisteredUserExistsParametersValidator;

/**
 * This parameters group class is used to check if a registered user exists.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class RegisteredUserExistsParametersGroup extends ParametersGroup {

    protected string $email;

    protected string $username;

    protected string $pId;

    /**
     * Sets the email parameter.
     *
     * @param string|null $email
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
     * Sets the public identifier parameter.
     *
     * @param string|null $pId
     */
    public function setPId(string $pId): void {
        $this->pId = $pId;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): RegisteredUserExistsParametersValidator {
        return new RegisteredUserExistsParametersValidator();
    }
}
