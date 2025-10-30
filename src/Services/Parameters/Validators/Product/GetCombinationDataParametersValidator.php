<?php

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Services\Parameters\Validators\Basket\ProductParametersValidatorTrait;

/**
 * This is the get currnet data parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class GetCombinationDataParametersValidator extends ParametersValidator {
    use ProductParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'quantity' ];

}
