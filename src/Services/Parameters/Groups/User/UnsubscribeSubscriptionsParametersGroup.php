<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\UnsubscribeSubscriptionsParametersValidator;

/**
 * This is the user model (UnsubscribeSubscriptions resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class UnsubscribeSubscriptionsParametersGroup extends ParametersGroup {

    protected string $subscriptionType;

    /**
     * Sets the subscriptionType parameter for this parameters group.
     *
     * @param string $subscriptionType
     *
     * @return void
     */
    public function setSubscriptionType(string $subscriptionType): void {
        $this->subscriptionType = $subscriptionType;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): UnsubscribeSubscriptionsParametersValidator {
        return new UnsubscribeSubscriptionsParametersValidator();
    }
}
