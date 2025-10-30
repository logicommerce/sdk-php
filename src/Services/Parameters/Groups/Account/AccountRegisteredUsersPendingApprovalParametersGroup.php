<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Account\AccountRegisteredUsersPendingApprovalParametersValidator;

/**
 * This is the account model (registered users resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class AccountRegisteredUsersPendingApprovalParametersGroup extends ParametersGroup {

    protected string $hash;

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
    protected function getValidator(): AccountRegisteredUsersPendingApprovalParametersValidator {
        return new AccountRegisteredUsersPendingApprovalParametersValidator();
    }
}
