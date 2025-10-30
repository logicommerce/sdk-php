<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\RecoverPasswordParametersValidator;

/**
 * This is the user model (recover password resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class RecoverPasswordParametersGroup extends ParametersGroup {

    protected string $email;

    protected string $username;

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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): RecoverPasswordParametersValidator {
        return new RecoverPasswordParametersValidator();
    }
}
