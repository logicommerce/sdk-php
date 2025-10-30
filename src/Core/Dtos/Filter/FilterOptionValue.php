<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Option filter class.
 *
 * @see FilterOption::getValue()
 * @see FilterOption::getPriority()
 *
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterOptionValue {
    use ElementTrait;

    private string $value = '';

    private int $priority = 0;

    /**
     * Returns the value of the option value in the filter.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the priority of the option value in the filter.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }
}
