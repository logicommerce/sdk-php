<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\User\RewardPointsParametersValidator;

/**
 * This is the user model (reward points resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class RewardPointsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): RewardPointsParametersValidator {
        return new RewardPointsParametersValidator();
    }
}
