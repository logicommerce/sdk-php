<?php

namespace SDK\Dtos\User;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\SubscriptionType;

/**
 * This is the user Subscription main class.
 * The user stock alerts information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Subscription::getEmail()
 * @see Subscription::getSubscriptionType()
 * @see Subscription::getVerified()
 * @see Subscription::getActive()
 * @see Subscription::getSubscribedAt()
 * @see Subscription::getUnsubscribedAt()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\User
 */
class Subscription extends Element {
    use ElementTrait, EnumResolverTrait;

    protected string $email = '';

    protected string $subscriptionType = '';

    protected bool $verified = false;

    protected bool $active = false;

    protected ?Date $subscribedAt = null;

    protected ?Date $unsubscribedAt = null;

    /**
     * Returns the email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the subscriptionType.
     *
     * @return string
     */
    public function getSubscriptionType(): string {
        return $this->getEnum(SubscriptionType::class, $this->subscriptionType, '');
    }

    /**
     * Returns the verified.
     *
     * @return bool
     */
    public function getVerified(): bool {
        return $this->verified;
    }

    /**
     * Returns the active.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }


    /**
     * Returns the date when the subscribedAt.
     *
     * @return Date|NULL
     */
    public function getSubscribedAt(): ?Date {
        return $this->subscribedAt;
    }

    protected function setSubscribedAt(string $subscribedAt): void {
        $this->subscribedAt = Date::create($subscribedAt);
    }

    /**
     * Returns the date when the unsubscribedAt.
     *
     * @return Date|NULL
     */
    public function getUnsubscribedAt(): ?Date {
        return $this->unsubscribedAt;
    }

    protected function setUnsubscribedAt(string $unsubscribedAt): void {
        $this->unsubscribedAt = Date::create($unsubscribedAt);
    }
}
