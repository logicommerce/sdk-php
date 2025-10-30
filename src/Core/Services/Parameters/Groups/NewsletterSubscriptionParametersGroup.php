<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Validators\NewsletterSubscriptionParametersValidator;

/**
 * This is the Newsletter Subscription parameters group class.
 * 
 * @see NewsletterSubscriptionParametersGroup::setAction()
 * @see NewsletterSubscriptionParametersGroup::getAction()
 * @see NewsletterSubscriptionParametersGroup::setData()
 * 
 * @package SDK\Core\Services\Parameters\Groups
 */
class NewsletterSubscriptionParametersGroup extends ParametersGroup {

    protected string $email;

    protected array $subscriptionData;

    /**
     * Sets the email parameter for this parameters group.
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * Returns the email value.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Sets the subscriptionData parameter for this parameters group.
     *
     * @param array $subscriptionData
     *
     * @return void
     */
    public function setSubscriptionData(array $subscriptionData): void {
        $this->subscriptionData = $subscriptionData;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): NewsletterSubscriptionParametersValidator {
        return new NewsletterSubscriptionParametersValidator();
    }
}
