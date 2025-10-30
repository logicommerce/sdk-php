<?php

namespace SDK\Dtos\Basket\BasketRows\Options;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\BasketRows\Option;

/**
 * This is the basket product date option class.
 *
 * @see DateOption::getValue()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketRows\Options
 */
class DateOption extends Option {
    use ElementTrait;

    protected ?Date $value = null;

    /**
     * Returns the option value.
     *
     * @return Date|NULL
     */
    public function getValue(): ?Date {
        return $this->value;
    }

    protected function setValue(string $value): void {
        $this->value = Date::create($value);
    }
}
