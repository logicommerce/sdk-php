<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the RewardPoints parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class RewardPointsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;
}
