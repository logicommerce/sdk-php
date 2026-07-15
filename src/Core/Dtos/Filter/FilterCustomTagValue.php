<?php

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Custom Tag filter value class.
 * Bundles, for a single selectable value of a custom tag filter, the displayed
 * value, the token submitted when filtering, and an optional per-value display name.
 *
 * @see FilterCustomTagValue::getValue()
 * @see FilterCustomTagValue::getFilterValue()
 * @see FilterCustomTagValue::getName()
 *
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class FilterCustomTagValue {
    use ElementTrait;

    private string $value = '';

    private string $filterValue = '';

    private ?string $name = null;

    /**
     * Returns the displayed value (image URL for image types, raw value otherwise).
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the token submitted when this value is used as a filter.
     *
     * @return string
     */
    public function getFilterValue(): string {
        return $this->filterValue;
    }

    /**
     * Returns the per-value display name (only present for image-selectable custom tags).
     *
     * @return string|null
     */
    public function getName(): ?string {
        return $this->name;
    }
}
