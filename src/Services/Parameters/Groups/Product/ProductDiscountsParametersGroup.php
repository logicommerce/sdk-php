<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\SortableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Product\ProductDiscountsParametersValidator;

/**
 * This is the product discounts model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class ProductDiscountsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait, SortableItemsParametersGroupTrait;

    protected string $conditionsToBeMet;

    protected string $discardConditionedBy;

    /**
     * Comma separated list of the conditional types that the returned discounts must meet in case they are set. Admited values for the list: ACTIVITY_LIMIT, PERIOD, VALUE_NUM_ORDERS.
     *
     * @param string $conditionsToBeMet
     *
     * @return void
     */
    public function setConditionsToBeMet(string $conditionsToBeMet): void {
        $this->conditionsToBeMet = $conditionsToBeMet;
    }

    /**
     * Comma separated list of the conditional types you want to discard Discounts conditioned by them. Empty list means do not discard by any condition type.
     *
     * @param string $discardConditionedBy
     *
     * @return void
     */
    public function setDiscardConditionedBy(string $discardConditionedBy): void {
        $this->discardConditionedBy = $discardConditionedBy;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ProductDiscountsParametersValidator {
        return new ProductDiscountsParametersValidator();
    }
}
