<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Basket\LockedStocksAggregateDataParametersValidator;

/**
 * This is the LockedStocksAggregateData parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 * 
 * @see PaginableItemsParametersGroupTrait
 */
class LockedStocksAggregateDataParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $productCombinationIdList;

    /**
     * Sets the productCombinationIdList parameter for this parameters group. Comma separated list of the internal identifiers of the product combinations to be considered.
     *
     * @param string $productCombinationIdList
     *
     * @return void
     */
    public function setProductCombinationIdList(string $productCombinationIdList): void {
        $this->productCombinationIdList = $productCombinationIdList;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): LockedStocksAggregateDataParametersValidator {
        return new LockedStocksAggregateDataParametersValidator();
    }
}
