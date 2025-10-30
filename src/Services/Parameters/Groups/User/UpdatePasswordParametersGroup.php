<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\UpdatePasswordParametersValidator;

/**
 * This is the user model (update password resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class UpdatePasswordParametersGroup extends ParametersGroup {

    protected string $password;

    protected string $newPassword;

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
     * Sets the new password parameter for this parameters group.
     *
     * @param string $newPassword
     *
     * @return void
     */
    public function setNewPassword(string $newPassword): void {
        $this->newPassword = $newPassword;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): UpdatePasswordParametersValidator {
        return new UpdatePasswordParametersValidator();
    }
}
