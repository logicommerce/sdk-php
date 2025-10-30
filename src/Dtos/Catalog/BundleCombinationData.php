<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Catalog\BundleCombinationData as CoreBundleCombinationData;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CombinationDataStatus;

/**
 * This is the BundleCombinationData class.
 * The bundle current data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BundleCombinationData::getItems()
 * @see BundleCombinationData::getStatus()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @uses ElementTrait
 * 
 * @package SDK\Dtos\Catalog
 */
class BundleCombinationData extends CoreBundleCombinationData {
    use ElementTrait, EnumResolverTrait;

    protected array $items = [];

    protected string $status = '';

    /**
     * Returns the items of the option in the filter.
     *
     * @return BundleCombinationDataItem[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, BundleCombinationDataItem::class);
    }

    /**
     * Returns the status value.
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->getEnum(CombinationDataStatus::class, $this->status, CombinationDataStatus::UNAVAILABLE);
    }
}
