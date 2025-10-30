<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\PaymentValidateType;
use SDK\Enums\PaymentValidateStatus;
/**
 * This is the order validation class.
 * The order validations will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PaymentValidationResponse::getMessage()
 * @see PaymentValidationResponse::getToken()
 * @see PaymentValidationResponse::getStatus()
 * @see PaymentValidationResponse::getType()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos
 */
class PaymentValidationResponse extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait;

    protected string $message = '';

    protected string $token = '';

    protected string $type = 'NO_DATA';

    protected string $status = 'KO';

    /**
     * Returns the order validation message.
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Returns the order validation token.
     *
     * @return string
     */
    public function getToken(): string {
        return $this->token;
    }

    /**
     * Returns the payment validation response type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(PaymentValidateType::class, $this->type, '');
    }

    /**
     * Returns the payment validation response type.
     *
     * @return string
     */
    public function getStatus(): string { // ENUM
        return $this->getEnum(PaymentValidateStatus::class, $this->status, 'KO');
    }

}
