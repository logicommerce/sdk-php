<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\SetNewPasswordParametersValidator;

/**
 * This is the user model (set new password password resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class SetNewPasswordParametersGroup extends ParametersGroup {

    protected string $password;

    protected string $hash;

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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): SetNewPasswordParametersValidator {
        return new SetNewPasswordParametersValidator();
    }
}
