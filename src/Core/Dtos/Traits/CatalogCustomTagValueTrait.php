<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Dtos\CatalogCustomTagValue;

/**
 * This is the catalog custom tag value trait.
 *
 * @see CatalogCustomTagValueTrait::getCustomTag()
 * @see CatalogCustomTagValueTrait::getCustomTags()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait CatalogCustomTagValueTrait {

    protected array $customTagValues = [];

    /**
     * Returns the element custom tag filtered by the given id.
     *
     * @param string $customTagPId
     *            Public identifier of the custom tag you want to get.
     *
     * @see CatalogCustomTagValue
     * @return CatalogCustomTagValue|NULL
     */
    public function getCustomTagValue(string $customTagPId): ?CatalogCustomTagValue {
        foreach ($this->getCustomTagValues() as $customTag) {
            if ($customTag->getCustomTagPId() === $customTagPId) {
                return $customTag;
            }
        }
        return null;
    }

    /**
     * Returns the element custom tags.
     *
     * @see CatalogCustomTagValue
     * @return CatalogCustomTagValue[]
     */
    public function getCustomTagValues(): array {
        return $this->customTagValues;
    }

    protected function setCustomTagValues(array $customTagValues): void {
        $this->customTagValues = $this->setArrayField($customTagValues, CatalogCustomTagValue::class);
    }
}
