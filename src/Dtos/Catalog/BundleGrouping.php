<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the BundleGrouping class.
 * The information of API Categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BundleGrouping::getItems()
 * @see BundleGrouping::getLanguage()
 * @see BundleGrouping::getApplyDiscounts()
 * @see BundleGrouping::getCombinationData()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class BundleGrouping extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected array $items = [];

    protected ?BundleDefinitionLanguage $language = null;

    protected bool $applyDiscounts = false;

    protected ?BundleCombinationData $combinationData = null;

    /**
     * Returns the items array.
     *
     * @return BundleGroupingItem[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, BundleGroupingItem::class);
    }

    /**
     * Returns the item language object.
     *
     * @see BundleDefinitionLanguage
     * @return BundleDefinitionLanguage|NULL
     */
    public function getLanguage(): ?BundleDefinitionLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new BundleDefinitionLanguage($language);
    }

    /**
     * Returns the applyDiscounts value.
     *
     * @return bool
     */
    public function getApplyDiscounts(): bool {
        return $this->applyDiscounts;
    }

    /**
     * Returns the item current data object.
     *
     * @see BundleCombinationData
     * @return BundleCombinationData|NULL
     */
    public function getCombinationData(): ?BundleCombinationData {
        return $this->combinationData;
    }

    protected function setCombinationData(array $combinationData): void {
        $this->combinationData = new BundleCombinationData($combinationData);
    }

}
