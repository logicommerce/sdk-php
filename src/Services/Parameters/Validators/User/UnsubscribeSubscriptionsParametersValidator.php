<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Enums\SubscriptionType;

/**
 * This is the UnsubscribeSubscriptions parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class UnsubscribeSubscriptionsParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['subscriptionType'];

    protected function validateSubscriptionType($subscriptionType): ?bool {
        return $this->validateEnumerateValue($subscriptionType, SubscriptionType::class);
    }
}
