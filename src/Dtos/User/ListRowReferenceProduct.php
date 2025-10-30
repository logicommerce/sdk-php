<?php

namespace SDK\Dtos\User;

use SDK\Dtos\Catalog\ProductCombinationData;

/**
 * This is the list row reference main class.
 * The list row reference information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ListRowReferenceProduct::getOptions()
 * @see ListRowReferenceProduct::getCombinationData()
 *
 * @see ListRowReference
 *
 * @package SDK\Dtos\User
 */
class ListRowReferenceProduct extends ListRowReference {

    protected array $options = [];

    protected ?ProductCombinationData $combinationData = null;

    /**
     * Specifies the order of presentation of this item in relation to the rest of items of the same type.
     *
     * @return array
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, OptionReference::class);
    }

    /**
     * Specifies whether the rows of the shopping list are automatically deleted from the shopping list when their items are purchased though them
     *
     * @return NULL|ProductCombinationData
     */
    public function getCombinationData(): ?ProductCombinationData {
        return $this->combinationData;
    }

    protected function setCombinationData(array $combinationData): void {
        $this->combinationData = new ProductCombinationData($combinationData);
    }
}
