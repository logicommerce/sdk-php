<?php

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Services\Parameters\Validators\Basket\BundleParametersValidatorTrait;

/**
 * This is the get bundle definitions groupings current data parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class GetBundleDefinitionsGroupingsCombinationDataParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, BundleParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'id', 'quantity' ];
}
