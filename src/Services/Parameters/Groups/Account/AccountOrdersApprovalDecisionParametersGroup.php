<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Account\AccountOrdersApprovalDecisionParametersValidator;

/**
 * This is the account orders approval decision parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class AccountOrdersApprovalDecisionParametersGroup extends ParametersGroup {

    protected string $decision;


    /**
     * Sets the decision parameter for this parameters group.
     *
     * @param string $decision
     *
     * @return void
     */
    public function setDecision(string $decision): void {
        $this->decision = $decision;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AccountOrdersApprovalDecisionParametersValidator {
        return new AccountOrdersApprovalDecisionParametersValidator();
    }
}
