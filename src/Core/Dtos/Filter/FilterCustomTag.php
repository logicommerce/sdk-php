<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\CustomTagsBaseDataTrait;
use SDK\Core\Dtos\Filter\FilterCustomTagValue;

/**
 * This is the Custom Tag filter class.
 *
 * @see FilterCustomTag::getCustomTagValues()
 * @see FilterCustomTag::getValues()
 * @see FilterCustomTag::getFilterValues()
 * @see FilterCustomTag::getNameValues()
 *
 * @see FilterBasic
 * @see ElementTrait
 * @see CustomTagsBaseDataTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterCustomTag extends FilterBasic {
    use ElementTrait, CustomTagsBaseDataTrait;

    private array $customTagValues = [];

    /**
     * @deprecated Replaced by customTagValues.
     */
    private array $values = [];

    /**
     * @deprecated Replaced by customTagValues.
     */
    private array $filterValues = [];

    /**
     * @deprecated Replaced by customTagValues.
     */
    private array $nameValues = [];

    private int $position = 0;

    private string $minValue = '';

    private string $maxValue = '';

    private array $ranges = [];

    /**
     * Returns the selectable values for this custom tag filter, each bundling
     * value, filterValue and optional name.
     *
     * @return FilterCustomTagValue[]
     */
    public function getCustomTagValues(): array {
        return $this->customTagValues;
    }

    private function setCustomTagValues(array $customTagValues): void {
        $this->customTagValues = $this->setArrayField($customTagValues, FilterCustomTagValue::class);
        $this->values = array_map(fn ($customTagValue) => $customTagValue->getValue(), $this->customTagValues);
        $this->filterValues = array_map(fn ($customTagValue) => $customTagValue->getFilterValue(), $this->customTagValues);
        $names = array_map(fn ($customTagValue) => $customTagValue->getName(), $this->customTagValues);
        $this->nameValues = array_filter($names, fn ($name) => $name !== null) === [] ? [] : $names;
    }

    /**
     * Returns the array of values for this custom tag.
     *
     * @deprecated Derived from getCustomTagValues(); kept for backward compatibility.
     *
     * @return int[]
     */
    public function getValues(): array {
        return $this->values;
    }

    /**
     * Returns the array of filterValues for this custom tag.
     *
     * @deprecated Derived from getCustomTagValues(); kept for backward compatibility.
     *
     * @return int[]
     */
    public function getFilterValues(): array {
        return $this->filterValues;
    }

    /**
     * Per-value display names for image filters; index aligns with values/filterValues.
     *
     * @deprecated Derived from getCustomTagValues(); kept for backward compatibility.
     *
     * @return string[]
     */
    public function getNameValues(): array {
        return $this->nameValues;
    }

    /**
     * Returns the custom tag position.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Returns the custom tag minValue.
     *
     * @return string
     */
    public function getMinValue(): string {
        return $this->minValue;
    }

    /**
     * Returns the custom tag maxValue.
     *
     * @return string
     */
    public function getMaxValue(): string {
        return $this->maxValue;
    }

    /**
     * Returns the range intervals for this custom tag filter.
     *
     * @return FilterCustomTagRangeInterval[]
     */
    public function getRanges(): array {
        return $this->ranges;
    }

    private function setRanges(array $ranges): void {
        $this->ranges = $this->setArrayField($ranges, FilterCustomTagRangeInterval::class);
    }
}
