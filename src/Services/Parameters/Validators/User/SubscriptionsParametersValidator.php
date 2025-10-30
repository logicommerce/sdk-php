<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the Subscriptions parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class SubscriptionsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;
}
