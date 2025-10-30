<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Category filter class.
 *
 * @see FilterBasic::getParentId()
 *
 * @see FilterBasic
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterCategory extends FilterBasic {
    use ElementTrait, IdentifiableElementTrait;

    protected int $parentId = 0;

    /**
     * Returns the filter item parentId.
     *
     * @return int
     */
    public function getParentId(): int {
        return $this->parentId;
    }
}
