<?php

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;

/**
 * This is the stock subscription parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class StockSubscriptionParametersValidator extends ParametersValidator {
    use EmailParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['email'];
}
