<?php declare(strict_types=1);

namespace SDK\Services\UserTraits;

use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Parameters\Groups\NewsletterSubscriptionParametersGroup;
use SDK\Dtos\User\NewsletterSubscription;

/**
 * This is the user subscribe/unsubscribe/checkStatus newsletter trait.
 * The methods that manage newsletter subscriptions requests to the API will be located here.
 *
 * @see NewsletterTrait::newsletterSubscription()
 * @see NewsletterTrait::newsletterUnsubscription()
 * @see NewsletterTrait::newsletterCheckStatus()
 *
 * @package SDK\Services\UserTraits
 */
trait NewsletterTrait {

    /**
     * Subscribe user to the newsletter
     * 
     * @param NewsletterSubscriptionParametersGroup $params
     *
     * @return NewsletterSubscription|NULL
     */
    public function newsletterSubscribe(NewsletterSubscriptionParametersGroup $params): ?NewsletterSubscription {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::NEWSLETTER_SUBSCRIPTION_SUBSCRIBE)->method(self::POST)->body($params)->build()),
            NewsletterSubscription::class
        );
    }

    /**
     * Unsubscribe user to the newsletter
     *
     * @param NewsletterSubscriptionParametersGroup $params
     *
     * @return NewsletterSubscription|NULL
     */
    public function newsletterUnsubscribe(NewsletterSubscriptionParametersGroup $params): ?NewsletterSubscription {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::NEWSLETTER_SUBSCRIPTION_UNSUBSCRIBE)->method(self::POST)->body($params)->build()),
            NewsletterSubscription::class
        );
    }

    /**
     * Check status user in the newsletter
     *
     * @param NewsletterSubscriptionParametersGroup $params
     *
     * @return NewsletterSubscription|NULL
     */
    public function newsletterCheckStatus(NewsletterSubscriptionParametersGroup $params): ?NewsletterSubscription {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::NEWSLETTER_SUBSCRIPTION_CHECK_STATUS)->method(self::POST)->body($params)->build()),
            NewsletterSubscription::class
        );
    }

}
