<?php

namespace SDK\Dtos\Catalog\Product\StockAlert;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the stock alert combination value class.
 * The combination values of API stock alerts will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Combination::getOptionId()
 * @see Combination::getOptionName()
 * @see Combination::getValueId()
 * @see Combination::getValueName()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product\StockAlert
 */
class CombinationValue extends Element {
    use ElementTrait;

    protected int $optionId = 0;

    protected string $optionName = '';

    protected int $valueId = 0;

    protected string $valueName = '';

    /**
     * Returns the option internal identifier of the combination value.
     *
     * @return int
     */
    public function getOptionId(): int {
        return $this->optionId;
    }

    /**
     * Returns the option name of the combination value.
     *
     * @return string
     */
    public function getOptionName(): string {
        return $this->optionName;
    }

    /**
     * Returns the option value internal identifier of the combination value.
     *
     * @return int
     */
    public function getValueId(): int {
        return $this->valueId;
    }

    /**
     * Returns the option value name of the combination value.
     *
     * @return string
     */
    public function getValueName(): string {
        return $this->valueName;
    }
}
