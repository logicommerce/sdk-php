<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Enums\CustomTagType;
use SDK\Services\Parameters\Groups\CustomTagsParametersGroup;
use SDK\Services\Parameters\Validators\CustomTagsParametersValidator;

/**
 * This is the user model (get custom tags resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class UserCustomTagsParametersGroup extends CustomTagsParametersGroup {

    protected string $type = CustomTagType::ACCOUNT;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CustomTagsParametersValidator {
        return new CustomTagsParametersValidator();
    }
}
