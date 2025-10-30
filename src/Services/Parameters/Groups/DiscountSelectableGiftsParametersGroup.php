<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\DiscountSelectableGiftsParametersValidator;

/**
 * This is the  discounts model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class DiscountSelectableGiftsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $sort;

    protected string $stockType;

    /**
     * Sets the sort criteria parameter for this parameters group.
     *
     * @param string $sort
     *
     * @return void
     */
    public function setSort(string $sort): void {
        $this->sort = $sort;
    }

    /**
     * Sets the stockType criteria parameter for this parameters group.
     *
     * @param string $stockType
     *
     * @return void
     */
    public function setStockType(string $stockType): void {
        $this->stockType = $stockType;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): DiscountSelectableGiftsParametersValidator {
        return new DiscountSelectableGiftsParametersValidator();
    }
}
