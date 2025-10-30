<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the account model (registered users resource) parameters validator class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class AccountRegisteredUsersPendingApprovalParametersValidator extends ParametersValidator {

    protected function validateHash($hash): ?bool {
        return $this->validateString($hash);
    }
}
