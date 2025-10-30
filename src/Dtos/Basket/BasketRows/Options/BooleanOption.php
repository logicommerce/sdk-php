<?php

namespace SDK\Dtos\Basket\BasketRows\Options;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\BasketRows\Option;

/**
 * This is the basket product boolean option class.
 *
 * @see BooleanOption::getValue()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketRows\Options
 */
class BooleanOption extends Option {
    use ElementTrait;

    protected bool $value = false;

    /**
     * Returns the option value.
     *
     * @return bool
     */
    public function getValue(): bool {
        return $this->value;
    }
}
