<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\User\SubscriptionsParametersValidator;

/**
 * This is the user model (Subscriptions resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class SubscriptionsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): SubscriptionsParametersValidator {
        return new SubscriptionsParametersValidator();
    }
}
