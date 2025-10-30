<?php

namespace SDK\Dtos\Basket\BasketRows\Options;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\BasketRows\Option;

/**
 * This is the basket product single selection option class.
 *
 * @see SingleSelectionOption::getValue()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketRows\Options
 */
class SingleSelectionOption extends Option {
    use ElementTrait;

    protected ?OptionValue $value = null;

    /**
     * Returns the option value.
     *
     * @return OptionValue|NULL
     */
    public function getValue(): ?OptionValue {
        return $this->value;
    }

    protected function setValue(array $value): void {
        $this->value = new OptionValue($value);
    }
}
