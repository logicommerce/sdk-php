<?php

namespace SDK\Dtos\Basket\BasketWarnings;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\BasketWarningAttributeType;

/**
 * This is the integer basket warning attribute class.
 *
 * @see BasketWarningIntegerAttribute::getValue()
 * @see BasketWarningIntegerAttribute::getType()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketWarnings
 */
class BasketWarningIntegerAttribute extends BasketWarningAttribute {
    use ElementTrait;

    protected int $value = 0;

    /**
     * Returns the attribute value.
     *
     * @return int
     */
    public function getValue(): int {
        return $this->value;
    }

    protected function setValue($value): void {
        if (!is_int($value)) {
            throw new \InvalidArgumentException('Integer expected');
        }
        $this->value = $value;
    }

    protected function getDefaultType(): string { // ENUM
        return BasketWarningAttributeType::INTEGER;
    }
}
