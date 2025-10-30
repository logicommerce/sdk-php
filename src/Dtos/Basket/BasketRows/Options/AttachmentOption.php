<?php

namespace SDK\Dtos\Basket\BasketRows\Options;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\BasketRows\Option;

/**
 * This is the basket product attachment option class.
 *
 * @see AttachmentOption::getValue()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketRows\Options
 */
class AttachmentOption extends Option {
    use ElementTrait;

    protected array $values = [];

    /**
     * Returns the option values.
     *
     * @return array
     */
    public function getValues(): array {
        return $this->values;
    }
}
