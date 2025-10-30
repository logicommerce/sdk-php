<?php

namespace SDK\Dtos\Basket\BasketWarnings;

use SDK\Core\Dtos\Element;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\BasketWarningAttributeType;

/**
 * This is the basket warning attribute base class.
 * The basket voucher groups information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketWarningAttribute::getDiscountCodes()
 *
 * @see Element
 *
 * @package SDK\Dtos\Basket\BasketWarnings
 */
abstract class BasketWarningAttribute extends Element {
    use EnumResolverTrait;

    protected string $key = '';

    protected string $type = '';

    /**
     * Returns the attribute key value.
     *
     * @return string
     */
    public function getKey(): string {
        return $this->key;
    }

    protected abstract function getDefaultType(): string;

    /**
     * Returns the attribute type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(BasketWarningAttributeType::class, $this->type, $this->getDefaultType());
    }

    public abstract function getValue();

    protected abstract function setValue($value): void;
}
