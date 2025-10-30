<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\CustomTagsBaseDataTrait;

/**
 * This is the Custom Tag filter class.
 *
 * @see FilterCustomTag::getValues()
 *
 * @see FilterBasic
 * @see ElementTrait
 * @see CustomTagsBaseDataTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterCustomTag extends FilterBasic {
    use ElementTrait, CustomTagsBaseDataTrait;

    private array $values = [];

    private array $filterValues = [];

    private int $position = 0;

    private string $minValue = '';

    private string $maxValue = '';

    /**
     * Returns the array of values for this custom tag.
     *
     * @return int[]
     */
    public function getValues(): array {
        return $this->values;
    }

    /**
     * Returns the array of filterValues for this custom tag.
     *
     * @return int[]
     */
    public function getFilterValues(): array {
        return $this->filterValues;
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
}
