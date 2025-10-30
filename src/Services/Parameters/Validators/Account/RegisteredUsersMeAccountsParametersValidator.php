<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\AccountType;

/**
 * This is the sales agent customers parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class RegisteredUsersMeAccountsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;
}
