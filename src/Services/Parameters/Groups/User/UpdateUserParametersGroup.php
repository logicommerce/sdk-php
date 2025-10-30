<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\UpdateParametersValidator;

/**
 * This is the user model (update user resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class UpdateUserParametersGroup extends UserParametersGroup {

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): UpdateParametersValidator {
        return new UpdateParametersValidator();
    }
}
