<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\CustomTagsDataTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the Catalog Custom Tag Value class.
 * The catalog custom tags values information of API elements will be stored in that class and will remain immutable
 * (only get methods are available)
 *
 * @see CatalogCustomTagValue::getGroupId()
 * @see CatalogCustomTagValue::getGroupPosition()
 * @see CatalogCustomTagValue::getPriority()
 * @see CatalogCustomTagValue::getGroupPriority()
 * @see CatalogCustomTagValue::getSelectableValueId()
 * @see CatalogCustomTagValue::getGroupName()
 * @see CatalogCustomTagValue::getValuePId()
 * @see CatalogCustomTagValue::getMinValue()
 * @see CatalogCustomTagValue::getMaxValue()
 *
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Core\Dtos
 */
class CatalogCustomTagValue extends CustomTagValue {
    use ElementTrait, CustomTagsDataTrait, EnumResolverTrait;

    protected int $groupId = 0;

    protected int $groupPosition = 0;

    protected int $priority = 0;

    protected int $groupPriority = 0;

    protected int $selectableValueId = 0;

    protected string $groupName = '';

    protected string $valuePId = '';

    protected string $minValue = '';

    protected string $maxValue = '';

    /**
     * Returns the group internal identifier of the catalog custom tag value.
     *
     * @return int
     */
    public function getGroupId(): int {
        return $this->groupId;
    }

    /**
     * Returns the group position of the catalog custom tag this value belongs.
     *
     * @return int
     */
    public function getGroupPosition(): int {
        return $this->groupPosition;
    }

    /**
     * Returns the priority of the catalog custom tag this value belongs.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the group priority of the catalog custom tag this value belongs.
     *
     * @return int
     */
    public function getGroupPriority(): int {
        return $this->groupPriority;
    }

    /**
     * Returns the selectable value internal identifier of the catalog custom tag value.
     *
     * @return int
     */
    public function getSelectableValueId(): int {
        return $this->selectableValueId;
    }

    /**
     * Returns the group name of the catalog custom tag this value belongs.
     *
     * @return string
     */
    public function getGroupName(): string {
        return $this->groupName;
    }

    /**
     * Returns the value public identifier.
     *
     * @return string
     */
    public function getValuePId(): string {
        return $this->valuePId;
    }

    /**
     * Returns the value minValue.
     *
     * @return string
     */
    public function getMinValue(): string {
        return $this->minValue;
    }

    /**
     * Returns the value maxValue.
     *
     * @return string
     */
    public function getMaxValue(): string {
        return $this->maxValue;
    }

}
