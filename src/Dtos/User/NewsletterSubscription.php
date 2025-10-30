<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\NewsletterSubscriptionMessageType;
use SDK\Enums\NewsletterSubscriptionStatus;

/**
 * This is the NewsletterSubscription class.
 * If the API returns is a void item with headers, this will be the response object.
 * The needed data will be stored here and remain immutable (only get methods are available)
 *
 * @see NewsletterSubscription::getStatus()
 * @see NewsletterSubscription::getStatus()
 * @see NewsletterSubscription::getStatus()
 * 
 * @see Element
 * 
 * @uses ElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Core\Dtos
 */
class NewsletterSubscription extends Element {
    use ElementTrait, EnumResolverTrait;

    protected string $status = '';

    protected string $messageType = '';

    protected string $message = '';

    /**
     * Returns the status. 
     * 
     * @return string
     */
    public function getStatus(): string {
        return $this->getEnum(NewsletterSubscriptionStatus::class, $this->status, NewsletterSubscriptionStatus::ERROR);
    }

    /**
     * Returns the messageType
     *
     * @return string
     */
    public function getMessageType(): string {
        return $this->getEnum(NewsletterSubscriptionMessageType::class, $this->messageType, NewsletterSubscriptionMessageType::INFO);
    }

    /**
     * Returns the message
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

}
