<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Custom Tag Groups filter class.
 *
 * @see FilterCustomTagGroups::getPosition()
 * @see FilterCustomTagGroups::getCustomTags()
 *
 * @see FilterBasic
 * @see ElementTrait
 * @see ElementNameTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterCustomTagGroups extends FilterBasic {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait;

    private int $position = 0;

    private array $customTags = [];

    /**
     * Returns the custom tag group position.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Returns the array of values for this custom tag group.
     *
     * @return int[]
     */
    public function getCustomTags(): array {
        return $this->customTags;
    }
}
