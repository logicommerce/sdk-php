<?php

namespace SDK\Dtos\Basket\BasketWarnings;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\BasketWarningAttributeType;

/**
 * This is the string basket warning attribute class.
 *
 * @see BasketWarningStringAttribute::getValue()
 * @see BasketWarningStringAttribute::getType()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketWarnings
 */
class BasketWarningStringAttribute extends BasketWarningAttribute {
    use ElementTrait;

    protected string $value = '';

    /**
     * Returns the attribute value value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    protected function setValue($value): void {
        if (!is_string($value)) {
            throw new \InvalidArgumentException('String expected');
        }
        $this->value = $value;
    }

    protected function getDefaultType(): string { // ENUM
        return BasketWarningAttributeType::STRING;
    }
}
