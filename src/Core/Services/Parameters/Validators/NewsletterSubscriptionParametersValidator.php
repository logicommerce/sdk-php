<?php

namespace SDK\Core\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;

/**
 * This is the Newsletter Subscription parameters validation class.
 *
 * @package SDK\Core\Services\Parameters\Validators
 */
class NewsletterSubscriptionParametersValidator extends ParametersValidator {
    use EmailParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['email'];

    protected function validateSubscriptionData($subscriptionData): ?bool {
        return $this->validateAssociativeArray($subscriptionData);
    }

}
