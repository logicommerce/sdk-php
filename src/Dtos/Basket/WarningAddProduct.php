<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the WarningAddProduct class.
 * The WarningAddProduct information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see WarningAddProduct::getId()
 * @see WarningAddProduct::getQuantity()
 * @see WarningAddProduct::getOptions()
 *
 * @see Element
 * 
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class WarningAddProduct extends Element {
    use ElementTrait;

    protected int $id = 0;

    protected int $quantity = 0;

    protected array $options = [];

    /**
     * Returns the internal id.
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Returns the internal quantity.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns the options.
     *
     * @return WarningAddProductOption[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, WarningAddProductOption::class);
    }

}
