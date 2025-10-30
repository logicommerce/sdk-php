<?php

namespace SDK\Dtos\Basket\BasketRows\Options;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\BasketRows\Option;

/**
 * This is the basket product multiple selection option class.
 *
 * @see MultipleSelectionOption::getValueList()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketRows\Options
 */
class MultipleSelectionOption extends Option {
    use ElementTrait;

    protected array $valueList = [];

    /**
     * Returns the option values.
     *
     * @return OptionValue[]
     */
    public function getValueList(): array {
        return $this->valueList;
    }

    protected function setValueList(array $valueList): void {
        $this->valueList = $this->setArrayField($valueList, OptionValue::class);
    }
}
