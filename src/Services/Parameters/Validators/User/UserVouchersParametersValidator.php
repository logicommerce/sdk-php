<?php

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the user model (get vouchers resource) validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class UserVouchersParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;
}
