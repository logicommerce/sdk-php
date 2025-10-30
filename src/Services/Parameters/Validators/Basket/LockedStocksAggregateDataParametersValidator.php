<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the LockedStocksAggregateData Parameters comment validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class LockedStocksAggregateDataParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, PaginableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['productCombinationIdList'];

    protected function validateProductCombinationIdList($productCombinationIdList): ?bool {
        return $this->validateIdList($productCombinationIdList);
    }
}
