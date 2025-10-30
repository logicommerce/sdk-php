<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Account\RegisteredUsersMeAccountsParametersValidator;

/**
 * This is the account model (registered users me accounts resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class RegisteredUsersMeAccountsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): RegisteredUsersMeAccountsParametersValidator {
        return new RegisteredUsersMeAccountsParametersValidator();
    }
}
