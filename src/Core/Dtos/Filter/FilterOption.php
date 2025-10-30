<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\OptionType;

/**
 * This is the Option filter class.
 *
 * @see FilterOption::getValues()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterOption {
    use ElementTrait, ElementNameTrait, EnumResolverTrait;

    private array $values = [];

    private string $type = '';

    private string $filterName = '';

    /**
     * Returns the values of the option in the filter.
     *
     * @return int[]
     */
    public function getValues(): array {
        return $this->values;
    }

    private function setValues(array $values): void {
        $this->values = $this->setArrayField($values, FilterOptionValue::class);
    }

    /**
     * Returns the option type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(OptionType::class, $this->type, OptionType::SHORT_TEXT);
    }

    /**
     * Returns the element filterName on the website current language.
     *
     * @return string
     */
    public function getFilterName(): string {
		if (empty($this->filterName)) {
			return $this->getName();
		}
        return $this->filterName;
    }
}
