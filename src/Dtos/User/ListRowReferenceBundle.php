<?php

namespace SDK\Dtos\User;

use SDK\Dtos\Catalog\BundleCombinationData;

/**
 * This is the list row reference main class.
 * The list row reference information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ListRowReferenceBundle::getOptions()
 * @see ListRowReferenceBundle::getCombinationData()
 *
 * @see ListRowReference
 * 
 * @package SDK\Dtos\User
 */
class ListRowReferenceBundle extends ListRowReference {

    protected array $options = [];

    protected ?BundleCombinationData $combinationData = null;

    /**
     *
     * @return ListRowReferenceBundleItem[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, ListRowReferenceBundleItem::class);
    }

    /**
     *
     * @return NULL|BundleCombinationData
     */
    public function getCombinationData(): ?BundleCombinationData {
        return $this->combinationData;
    }

    protected function setCombinationData(array $combinationData): void {
        $this->combinationData = new BundleCombinationData($combinationData);
    }
}
