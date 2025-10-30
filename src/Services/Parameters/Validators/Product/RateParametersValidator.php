<?php

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\RateParametersValidatorTrait;

/**
 * This is the product add comment parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class RateParametersValidator extends ParametersValidator {
    use RateParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['rating'];
}
