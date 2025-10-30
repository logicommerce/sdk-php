<?php

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the basket model (get custom tags resource) validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class BasketCustomTagsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;
}
