<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\WebhookResponseType;
/**
 * This is the webhook respnonse class.
 *
 * @see WebhookResponse::getMessage()
 * @see WebhookResponse::getType()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos
 */
class WebhookResponse extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait;

    protected string $message = '';

    protected string $type = 'NO_DATA';

    /**
     * Returns the webhook message.
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Returns the webhook response type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(WebhookResponseType::class, $this->type, '');
    }

}
