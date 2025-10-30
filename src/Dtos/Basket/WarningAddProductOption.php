<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the WarningAddProductOption class.
 * The WarningAddProductOption information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see WarningAddProductOption::getId()
 * @see WarningAddProductOption::getQuantity()
 * @see WarningAddProductOption::getOptions()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class WarningAddProductOption extends Element {
    use ElementTrait;

    protected int $id = 0;

    protected array $values = [];

    /**
     * Returns the internal id.
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Returns the values.
     *
     * @return array
     */
    public function getValues(): array {
        return $this->values;
    }

}
