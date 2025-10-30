<?php

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the basket add bundle parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class AddBundleParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, BundleParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['id', 'quantity', 'items'];
}
