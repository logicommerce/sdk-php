<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\UserVouchersParametersValidator;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;

/**
 * This is the user model (get vouchers resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class UserVouchersParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): UserVouchersParametersValidator {
        return new UserVouchersParametersValidator();
    }
}
