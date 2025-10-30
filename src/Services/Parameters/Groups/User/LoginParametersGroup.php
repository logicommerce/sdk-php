<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\LoginParametersValidator;

/**
 * This is the user model (login resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class LoginParametersGroup extends ParametersGroup {

    protected string $username;

    protected string $password;

    /**
     * Sets the username parameter for this parameters group.
     *
     * @param string $username
     *
     * @return void
     */
    public function setUsername(string $username): void {
        $this->username = $username;
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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): LoginParametersValidator {
        return new LoginParametersValidator();
    }
}
