<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementDiscountValueTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DiscountType;

/**
 * This is the applied discount container class.
 * The applied discounts information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AppliedDiscount::getDiscountId()
 * @see AppliedDiscount::getType()
 * @see AppliedDiscount::getValue()
 *
 * @see Element
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 * @see EnumResolverTrait
 * @see ElementDiscountValueTrait
 *
 * @package SDK\Dtos\Basket
 */
abstract class AppliedDiscount extends Element {
    use ElementNameTrait, ElementDescriptionTrait, EnumResolverTrait, ElementDiscountValueTrait;

    protected int $discountId = 0;

    protected string $type = '';

    protected float $value = 0.0;

    protected float $valueWithTaxes = 0.0;

    /**
     * Returns the applied discount internal identifier.
     *
     * @return int
     */
    public function getDiscountId(): int {
        return $this->discountId;
    }

    /**
     * Returns the applied discount type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(DiscountType::class, $this->type, DiscountType::AMOUNT);
    }

    /**
     * Returns the applied discount value.
     *
     * @return float
     */
    public function getValue(): float {
        return $this->value;
    }

    /**
     * Returns the applied discount valueWithTaxes.
     *
     * @return float
     */
    public function getValueWithTaxes(): float {
        return $this->valueWithTaxes;
    }
}
