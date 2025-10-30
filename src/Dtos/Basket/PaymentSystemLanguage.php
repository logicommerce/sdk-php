<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;

/**
 * This is the basket payment system Language class.
 * The language information of API basket payment systems will be stored in that class and will remain immutable
 * (only get methods are available)
 *
 * @see PaymentSystemLanguage::getMessage()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\Basket
 */
class PaymentSystemLanguage {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait;

    protected string $message = '';

    /**
     * Returns the payment system message for the website current language.
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }
}
