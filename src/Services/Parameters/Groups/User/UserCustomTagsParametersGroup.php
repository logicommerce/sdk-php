<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\UserCustomTagsParametersValidator;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;

/**
 * This is the user model (get custom tags resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class UserCustomTagsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): UserCustomTagsParametersValidator {
        return new UserCustomTagsParametersValidator();
    }
}
