<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Catalog\BundleCombinationData;
use SDK\Core\Dtos\Catalog\CombinationDataOption;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the BundleCombinationDataItem class.
 * The bundle current data item will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BundleCombinationDataItem::getProductId()
 * @see BundleCombinationDataItem::getOptions()
 *
 * @see CombinationData
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class BundleCombinationDataItem extends BundleCombinationData {
    use ElementTrait, IdentifiableElementTrait;

    protected int $productId = 0;

    protected array $options = [];

    /**
     * Returns the productId.
     *
     * @return int
     */
    public function getProductId(): int {
        return $this->productId;
    }

    /**
     * Returns the options of the option in the filter.
     *
     * @return CombinationDataOption[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, CombinationDataOption::class);
    }
}
