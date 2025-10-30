<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Filter basic class.
 *
 * @see FilterBasic::getId()
 * @see FilterBasic::getPriority()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterBasic {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait;

    protected int $priority = 0;

    /**
     * Returns the filter item priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }
}
