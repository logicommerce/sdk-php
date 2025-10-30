<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\TaxTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\TaxType;

/**
 * This is the basket tax class.
 * The basket taxes information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketTax::getDiscount()
 * @see BasketTax::getTaxRate()
 * @see BasketTax::getReRate()
 * @see BasketTax::getTaxValue()
 * @see BasketTax::getType()
 *
 * @see ElementTrait
 * @see TaxTrait
 *
 * @package SDK\Dtos\Basket
 */
abstract class BasketTax extends Element {
    use ElementTrait, TaxTrait, EnumResolverTrait;

    protected string $key = '';

    protected float $discount = 0.0;

    protected float $taxRate = 0.0;

    protected float $reRate = 0.0;

    protected float $taxValue = 0.0;

    protected string $type = '';

    /**
     * Returns the basket tax key.
     *
     * @param string $key
     */
    public function getKey(): string {
        return $this->key;
    }

    /**
     * Returns the basket tax discount.
     *
     * @return float
     */
    public function getDiscount(): float {
        return $this->discount;
    }

    /**
     * Returns the basket tax rate.
     *
     * @return float
     */
    public function getTaxRate(): float {
        return $this->taxRate;
    }

    /**
     * Returns the basket tax re rate.
     *
     * @return float
     */
    public function getReRate(): float {
        return $this->reRate;
    }

    /**
     * Returns the basket tax value.
     *
     * @return float
     */
    public function getTaxValue(): float {
        return $this->taxValue;
    }

    /**
     * Returns the basket tax type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(TaxType::class, $this->type, TaxType::LOGICOMMERCE);
    }
}
