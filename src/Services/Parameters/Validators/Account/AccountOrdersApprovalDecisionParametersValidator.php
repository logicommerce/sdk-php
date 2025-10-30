<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Enums\AccountOrderApprovalDecision;

/**
 * This is the account orders approval decision parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class AccountOrdersApprovalDecisionParametersValidator extends ParametersValidator {

    protected function validateDecision($decision): ?bool {
        return $this->validateEnumerateValues($decision, AccountOrderApprovalDecision::class);
    }
}
