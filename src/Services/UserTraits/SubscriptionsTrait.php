<?php

declare(strict_types=1);

namespace SDK\Services\UserTraits;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\User\Subscription;
use SDK\Services\Parameters\Groups\User\SubscriptionsParametersGroup;
use SDK\Services\Parameters\Groups\User\UnsubscribeSubscriptionsParametersGroup;

/**
 * This is the user stock alerts trait.
 * The methods that manage stock alerts requests to the API will be located here.
 *
 * @see SubscriptionsTrait::verifySubscriptionByToken()
 * @see SubscriptionsTrait::unsubscribeSubscriptionByToken()
 * @see SubscriptionsTrait::unsubscribeSubscription()
 * @see SubscriptionsTrait::getSubscriptions()
 * @see SubscriptionsTrait::addGetSubscriptions()
 * @see BatchRequests
 *
 * @package SDK\Services\UserTraits
 */
trait SubscriptionsTrait {

    /**
     * Verify subscription by token
     *
     * @param string $token
     *
     * @return Status|NULL
     */
    public function verifySubscriptionByToken(string $token): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ACCOUNTS_REGISTERED_USERS_SUBSCRIPTIONS_VERIFY_TOKEN)->method(self::POST)->pathParams(['token' => $token])->build()
            ),
            Status::class
        );
    }

    /**
     * Unsubscribe subscription by token
     *
     * @param string $token
     *
     * @return Status|NULL
     */
    public function unsubscribeSubscriptionByToken(string $token): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ACCOUNTS_REGISTERED_USERS_UNSUBSCRIBE_TOKEN)->method(self::DELETE)->pathParams(['token' => $token])->build()
            ),
            Status::class
        );
    }

    /**
     * Unsubscribe subscriptions
     *
     * @param UnsubscribeSubscriptionsParametersGroup $params
     *
     * @return Status|NULL
     */
    public function unsubscribeSubscriptions(UnsubscribeSubscriptionsParametersGroup $params): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNTS_REGISTERED_USERS_SUBSCRIPTIONS_UNSUBSCRIBE)->method(self::DELETE)->urlParams($params)->build()),
            Status::class
        );
    }

    /**
     * Returns all subscriptions for a registered user.
     * 
     * @param SubscriptionsParametersGroup $params
     *            object with the needed filters to send to the API user resource
     *
     * @return ElementCollection|NULL
     */
    public function getSubscriptions(SubscriptionsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Subscription::class, Resource::ACCOUNTS_REGISTERED_USERS_SUBSCRIPTIONS, $params);
    }

    /**
     * Add the request to get the Subscriptions filtered with the given parameters for the current user
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param SubscriptionsParametersGroup $params
     *            object with the needed filters to send to the API user resource
     *
     * @return void
     */
    public function addGetSubscriptions(BatchRequests $batchRequests, string $batchName, SubscriptionsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNTS_REGISTERED_USERS_SUBSCRIPTIONS)->urlParams($params)
                ->build()
        );
    }
}
