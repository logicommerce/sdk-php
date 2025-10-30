<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\PaymentSystemPropertyValues as CoreDtosPaymentSystemPropertyValues;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the basket payment system property values class.
 * The basket payment system properties information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PaymentSystemPropertyValues::getValue()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Basket
 */
class PaymentSystemPropertyValues extends CoreDtosPaymentSystemPropertyValues {
    use ElementTrait;

    protected string $value = '';

    /**
     * Returns the payment system value.
     *
     * @return Array
     */
    public function getValue(): string {
        return $this->value;
    }
}
