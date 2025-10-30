<?php

namespace SDK\Dtos\Basket\BasketRows\Options;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\BasketRows\Option;

/**
 * This is the basket product single selection image option class.
 *
 * @see SingleSelectionImageOption::getValue()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketRows\Options
 */
class SingleSelectionImageOption extends Option {
    use ElementTrait;

    protected ?ImageOptionValue $value = null;

    /**
     * Returns the option value.
     *
     * @return ImageOptionValue|NULL
     */
    public function getValue(): ?ImageOptionValue {
        return $this->value;
    }

    protected function setValue(array $value): void {
        $this->value = new ImageOptionValue($value);
    }
}
