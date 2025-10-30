<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the BundleGroupingItem class.
 * The information of API Categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BundleGroupingItem::getProductId()
 * @see BundleGroupingItem::getQuantity()
 * @see BundleGroupingItem::getOptions()
 * 
 * @see Element
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class BundleGroupingItem extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected int $productId = 0;

    protected int $quantity = 0;

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
     * Returns the quantity.
     *
     * @return int0
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns the options.
     *
     * @return BundleDefinitionSectionItemOption[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, BundleDefinitionSectionItemOption::class);
    }

}
