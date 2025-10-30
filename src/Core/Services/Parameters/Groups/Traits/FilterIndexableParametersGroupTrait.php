<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Groups\Traits;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\FilterIndexableType;

/**
 * This is the filter indexable parameters group trait.
 *
 * @package SDK\Core\Services\Parameters\Groups\Traits
 */
trait FilterIndexableParametersGroupTrait {
    use EnumResolverTrait;

    protected string $filterIndexable;

    /**
     * Sets the filter indexable parameter for this parameters group.
     *
     * @param string $filterIndexable
     *
     * @return void
     */
    public function setFilterIndexable(string $filterIndexable): void {
        $this->filterIndexable = $filterIndexable;
    }

    /**
     * Returns the filter indexable parameter value.
     *
     * @return string
     */
    public function getFilterIndexable(): string { // ENUM
        return $this->getEnum(FilterIndexableType::class, $this->filterIndexable, FilterIndexableType::ALL);
    }

}
