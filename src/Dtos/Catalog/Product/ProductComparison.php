<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\CustomTagValuesTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Product Comparison class.
 * Information for each custom tag group that contains comparable custom tags associated to the product comparison products. In case the custom tag group depends on another, all the parent groups up to the root are recursively included to make up the complete path.
 *
 * @see ProductComparison::getPriority()
 * @see ProductComparison::getPosition()
 * @see ProductComparison::getComparable()
 * @see ProductComparison::getParentId()
 * @see ProductComparison::getCustomTags()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * 
 * @package SDK\Dtos\Catalog\Product
 */
class ProductComparison extends Element{
    use ElementTrait;

    protected array $items = [];

    protected array $customTagGroups = [];

    protected array $customTagsWithoutGroup = [];

    /**
     * Returns the element items.
     *
     * @return Product[]
     */
    public function getItems(): array {
        return $this->items;
    }

    protected function setItems(array $items): void {
        $this->items = $this->setArrayField($items, Product::class);
    }

    /**
     * Returns the element customTagGroups.
     *
     * @return ProductComparisonCustomTagGroup[]
     */
    public function getCustomTagGroups(): array {
        return $this->customTagGroups;
    }

    protected function setCustomTagGroups(array $customTagGroups): void {
        $this->customTagGroups = $this->setArrayField($customTagGroups, ProductComparisonCustomTagGroup::class);
    }

    /**
     * Returns the element customTagsWithoutGroup.
     *
     * @return ProductComparisonCustomTagGroupCustomTag[]
     */
    public function getCustomTagsWithoutGroup(): array {
        return $this->customTagsWithoutGroup;
    }

    protected function setCustomTagsWithoutGroup(array $customTagsWithoutGroup): void {
        $this->customTagsWithoutGroup = $this->setArrayField($customTagsWithoutGroup, ProductComparisonCustomTagGroupCustomTag::class);
    }

}
