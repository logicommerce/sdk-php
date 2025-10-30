<?php

namespace SDK\Dtos\Basket\BasketRows\Options;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\BasketRows\Option;

/**
 * This is the basket product short text option class.
 *
 * @see ShortTextOption::getValue()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketRows\Options
 */
class ShortTextOption extends Option {
    use ElementTrait;

    protected string $value = '';

    /**
     * Returns the option value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }
}
