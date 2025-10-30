<?php

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the user model (get custom tags resource) validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class UserCustomTagsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;
}
