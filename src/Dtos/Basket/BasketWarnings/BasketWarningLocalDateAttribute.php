<?php

namespace SDK\Dtos\Basket\BasketWarnings;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Resources\Date;
use SDK\Enums\BasketWarningAttributeType;

/**
 * This is the local date basket warning attribute class.
 *
 * @see BasketWarningLocalDateAttribute::getValue()
 * @see BasketWarningLocalDateAttribute::getType()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketWarnings
 */
class BasketWarningLocalDateAttribute extends BasketWarningAttribute {
    use ElementTrait;

    protected ?Date $value = null;

    /**
     * Returns the attribute value.
     *
     * @return Date|NULL
     */
    public function getValue(): ?Date {
        return $this->value;
    }

    protected function setValue($value): void {
        $this->value = Date::create($value);
        if (is_null($this->value)) {
            throw new \InvalidArgumentException('Valid date expected');
        }
    }

    protected function getDefaultType(): string { // ENUM
        return BasketWarningAttributeType::LOCAL_DATE;
    }
}
