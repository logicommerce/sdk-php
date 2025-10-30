<?php

namespace SDK\Dtos\Catalog\Product\StockAlert;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Catalog\Product\ProductCodes;

/**
 * This is the stock alert combination class.
 * The combinations of API stock alerts will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Combination::getCodes()
 * @see Combination::getCombinationValues()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product\StockAlert
 */
class Combination extends Element {
    use ElementTrait;

    protected ?ProductCodes $codes = null;

    protected array $combinationValues = [];

    /**
     * Returns the combination codes.
     *
     * @return ProductCodes|NULL
     */
    public function getCodes(): ?ProductCodes {
        return $this->codes;
    }

    protected function setCodes(array $codes): void {
        $this->codes = new ProductCodes($codes);
    }

    /**
     * Returns the combination values.
     *
     * @return CombinationValue[]
     */
    public function getCombinationValues(): array {
        return $this->combinationValues;
    }

    protected function setCombinationValues(array $combinationValues): void {
        $this->combinationValues = $this->setArrayField($combinationValues, CombinationValue::class);
    }
}
