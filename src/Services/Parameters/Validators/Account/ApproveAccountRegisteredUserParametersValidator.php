<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Services\Parameters\Groups\Account\RegisteredUserApproveUpdateParametersGroup;

/**
 * This is the account model (registered users resource) parameters validator class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class ApproveAccountRegisteredUserParametersValidator extends ParametersValidator {

    protected function validateHash($hash): ?bool {
        return $this->validateString($hash);
    }

    protected function validateRegisteredUser($registeredUser): ?bool {
        if (is_array($registeredUser)) {
            (new RegisteredUserApproveUpdateParametersValidator())->validate($registeredUser);
            return true;
        }
        return $this->validateItemsClass([$registeredUser], RegisteredUserApproveUpdateParametersGroup::class);
    }
}
