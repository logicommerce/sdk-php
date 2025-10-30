<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\CustomTagValuesTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Product Comparison CustomTag Group class.
 * Information for each custom tag group that contains comparable custom tags associated to the product comparison products. In case the custom tag group depends on another, all the parent groups up to the root are recursively included to make up the complete path.
 *
 * @see ProductComparisonCustomTagGroup::getPriority()
 * @see ProductComparisonCustomTagGroup::getPosition()
 * @see ProductComparisonCustomTagGroup::getComparable()
 * @see ProductComparisonCustomTagGroup::getParentId()
 * @see ProductComparisonCustomTagGroup::getCustomTags()
 *
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * @uses IntegrableElementTrait
 * @uses ElementNameTrait
 * @uses ElementDescriptionTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ProductComparisonCustomTagGroup {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, ElementNameTrait, ElementDescriptionTrait;

    protected int $position = 0;

    protected int $priority = 0;

    protected bool $comparable = false;

    protected int $parentId = 0;

    protected array $customTags = [];

    /**
     * Returns the product position
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Returns the product priority
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the comparable
     *
     * @return bool
     */
    public function getComparable(): bool {
        return $this->comparable;
    }


    /**
     * Returns the parentId
     *
     * @return int
     */
    public function getParentId(): int {
        return $this->parentId;
    }

    /**
     * Returns the element custom tag values.
     *
     * @return ProductComparisonCustomTagGroupCustomTag[]
     */
    public function getCustomTags(): array {
        return $this->customTags;
    }

    protected function setCustomTags(array $customTags): void {
        $this->customTags = $this->setArrayField($customTags, ProductComparisonCustomTagGroupCustomTag::class);
    }

}
