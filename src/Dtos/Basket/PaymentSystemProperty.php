<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\PaymentSystemPropertyValues;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Dtos\Basket\PaymentSystemPropertyValues as BasketPaymentSystemPropertyValues;

/**
 * This is the basket payment system property class.
 * The basket payment system properties information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PaymentSystemProperty::getValues()
 * @see PaymentSystemProperty::getSelected()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Basket
 */
class PaymentSystemProperty extends Element {
    use ElementTrait, ElementNameTrait;

    protected ?PaymentSystemPropertyValues $values = null;

    protected bool $selected = false;

    /**
     * Returns the payment system values.
     *
     * @return PaymentSystemPropertyValues
     */
    public function getValues(): ?PaymentSystemPropertyValues {
        return $this->values;
    }

    protected function setValues(array $values) {
        $this->values = new BasketPaymentSystemPropertyValues($values);
    }

    /**
     * Returns if the payment system is already selected or not.
     *
     * @return bool
     */
    public function getSelected(): bool {
        return $this->selected;
    }

    /**
     * Sets if the payment system is already selected or not.
     *
     */
    public function setSelected(bool $selected): void {
        $this->selected = $selected;
    }
}
