<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Custom Tag range interval class.
 * Represents a predefined range bucket (e.g. "0 - 50", "50 - 100") that a
 * custom tag filter can offer for single-pick selection.
 *
 * @see FilterCustomTagRangeInterval::getName()
 * @see FilterCustomTagRangeInterval::getDescription()
 * @see FilterCustomTagRangeInterval::getPriority()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterCustomTagRangeInterval {
    use ElementTrait, IdentifiableElementTrait;

    private string $name = '';

    private string $description = '';

    private int $priority = 0;

    /**
     * Returns the range interval name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the range interval description.
     *
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * Returns the range interval display priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }
}
